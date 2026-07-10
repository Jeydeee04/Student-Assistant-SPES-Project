<?php
require_once '../db.php';

$cluster = $_GET['cluster'] ?? 'regular';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="inventory_report_' . $cluster . '_' . date('Y-m-d') . '.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, [
    'Property Number',
    'Type of Equipment',
    'Type of Property',
    'Actual User',
    'Price',
    'Status',
    'Personnel Name',
    'Designation',
    'Office/Division',
    'Description',
    'Remark'
]);

$query = "SELECT a.property_number, a.equipment_type, a.property_type, a.actual_user, a.price, a.status, 
                 p.name as personnel_name, p.designation, p.office_division, a.description, a.remarks 
          FROM assets a 
          LEFT JOIN personnel p ON a.personnel_id = p.personnel_id 
          WHERE a.fund_cluster = :cluster";

$stmt = $pdo->prepare($query);
$stmt->execute(['cluster' => $cluster]);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, $row);
}

fclose($output);
exit;
