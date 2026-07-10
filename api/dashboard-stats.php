<?php
require_once '../db.php';
header('Content-Type: application/json');

$query = $pdo->query("SELECT 
    COUNT(*) as total,
    SUM(CASE WHEN fund_cluster = 'regular' THEN 1 ELSE 0 END) as reg_total,
    SUM(CASE WHEN fund_cluster = 'split' THEN 1 ELSE 0 END) as split_total,
    SUM(CASE WHEN status = 'serviceable' AND fund_cluster = 'regular' THEN 1 ELSE 0 END) as reg_serv,
    SUM(CASE WHEN status = 'serviceable' AND fund_cluster = 'split' THEN 1 ELSE 0 END) as split_serv,
    SUM(CASE WHEN status = 'unserviceable' AND fund_cluster = 'regular' THEN 1 ELSE 0 END) as reg_unserv,
    SUM(CASE WHEN status = 'unserviceable' AND fund_cluster = 'split' THEN 1 ELSE 0 END) as split_unserv
    FROM assets");

echo json_encode($query->fetch());
