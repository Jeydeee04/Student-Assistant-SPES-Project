<?php
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $stmt = $pdo->prepare("SELECT a.*, p.name as personnel_name, p.designation, p.office_division 
                             FROM assets a 
                             LEFT JOIN personnel p ON a.personnel_id = p.personnel_id 
                             WHERE a.asset_id = :id");
        $stmt->execute(['id' => $id]);
        echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    } else {
        $cluster = $_GET['cluster'] ?? 'regular';
        $stmt = $pdo->prepare("SELECT a.*, p.name as personnel_name, p.designation, p.office_division 
                             FROM assets a 
                             LEFT JOIN personnel p ON a.personnel_id = p.personnel_id 
                             WHERE a.fund_cluster = :cluster");
        $stmt->execute(['cluster' => $cluster]);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    try {
        $pdo->beginTransaction();

        $stmtCheck = $pdo->prepare("SELECT personnel_id FROM personnel WHERE name = ? AND designation = ? AND office_division = ? LIMIT 1");
        $stmtCheck->execute([$data['personnel']['name'], $data['personnel']['designation'], $data['personnel']['office_division']]);
        $existingPersonnel = $stmtCheck->fetch();

        if ($existingPersonnel) {
            $personnelId = $existingPersonnel['personnel_id'];
        } else {
            $stmtP = $pdo->prepare("INSERT INTO personnel (name, designation, office_division) VALUES (?, ?, ?)");
            $stmtP->execute([$data['personnel']['name'], $data['personnel']['designation'], $data['personnel']['office_division']]);
            $personnelId = $pdo->lastInsertId();
        }

        $stmtA = $pdo->prepare("INSERT INTO assets (
            property_number, property_type, equipment_type, description, 
            price, fund_cluster, status, remarks, personnel_id, actual_user
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmtA->execute([
            $data['asset']['property_number'],
            $data['asset']['property_type'],
            $data['asset']['equipment_type'],
            $data['asset']['description'],
            $data['asset']['price'],
            $data['asset']['fund_cluster'],
            $data['asset']['status'],
            $data['asset']['remarks'],
            $personnelId,
            $data['asset']['actual_user']
        ]);

        $pdo->commit();
        echo json_encode(['status' => 'success', 'message' => 'Record processed successfully']);
    } catch (Exception $e) {
        $pdo->rollBack();
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $id = $_GET['id'] ?? null;
    $data = json_decode(file_get_contents('php://input'), true);

    if ($id && $data) {
        $stmt = $pdo->prepare("UPDATE assets SET 
            property_number = ?, 
            property_type = ?, 
            equipment_type = ?, 
            description = ?, 
            price = ?, 
            fund_cluster = ?, 
            status = ?, 
            remarks = ?, 
            personnel_id = ?, 
            actual_user = ? 
            WHERE asset_id = ?");

        $stmt->execute([
            $data['property_number'],
            $data['property_type'],
            $data['equipment_type'],
            $data['description'],
            $data['price'],
            $data['fund_cluster'],
            $data['status'],
            $data['remarks'],
            $data['personnel_id'],
            $data['actual_user'],
            $id
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        try {
            $stmt = $pdo->prepare("DELETE FROM assets WHERE asset_id = ?");
            $stmt->execute([$id]);
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Record deleted successfully']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
