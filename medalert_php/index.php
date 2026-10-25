<?php
/**
 * MedAlert - Campus Emergency & Health Support Platform
 * Single-file responsive prototype with full client & server interactivity.
 */
session_start();

// Helper functions
function h($v) {
    return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
}

function getInitialRequests() {
    return [
        [
            'id' => 'MA-2026-1051',
            'student_name' => 'Alex Morgan',
            'student_phone' => '(555) 234-8831',
            'issue' => 'Feeling unwell',
            'details' => 'Severe dizziness, nausea, and feeling faint after exam.',
            'location' => 'Main Campus • Library 2nd Floor (Quiet Study Rm 204)',
            'urgency' => 'High',
            'status' => 'En route',
            'created' => date('M j, Y • g:i A', strtotime('-18 minutes')),
            'created_ts' => time() - 1080,
            'assigned_to' => 'Nurse Elena Vance (Badge #402)',
            'eta' => '3 mins',
            'notes' => [
                ['by' => 'Triage Desk', 'text' => 'High urgency flagged. First-aid kit & wheelchair dispatched.', 'time' => date('g:i A', strtotime('-14 minutes'))],
                ['by' => 'Nurse Vance', 'text' => 'Entering Library via West entrance. Contacting student.', 'time' => date('g:i A', strtotime('-5 minutes'))]
            ],
            'timeline' => [
                ['title' => 'Request Received', 'desc' => 'Logged into campus emergency triage system', 'time' => date('g:i A', strtotime('-18 minutes')), 'done' => true],
                ['title' => 'Clinic Triage Review', 'desc' => 'Assessed by Registered Nurse at Health Center', 'time' => date('g:i A', strtotime('-15 minutes')), 'done' => true],
                ['title' => 'Responder Assigned', 'desc' => 'Nurse Elena Vance dispatched from Health Center', 'time' => date('g:i A', strtotime('-12 minutes')), 'done' => true],
                ['title' => 'En Route to Location', 'desc' => 'Approaching Library 2nd Floor with medical kit', 'time' => date('g:i A', strtotime('-5 minutes')), 'done' => true],
                ['title' => 'Care & Resolution', 'desc' => 'On-site medical assessment & post-care advice', 'time' => 'Estimated in 5m', 'done' => false]
            ]
        ],
        [
            'id' => 'MA-2026-1048',
            'student_name' => 'Marcus Chen',
            'student_phone' => '(555) 789-1122',
            'issue' => 'Breathing concern',
            'details' => 'Mild asthma flare-up; left inhaler in dormitory.',
            'location' => 'Science Complex • Lab 302',
            'urgency' => 'High',
            'status' => 'Ongoing',
            'created' => date('M j, Y • g:i A', strtotime('-35 minutes')),
            'created_ts' => time() - 2100,
            'assigned_to' => null,
            'eta' => null,
            'notes' => [
                ['by' => 'Triage Desk', 'text' => 'Immediate nebulizer/inhaler kit requested. Awaiting responder dispatch.', 'time' => date('g:i A', strtotime('-30 minutes'))]
            ],
            'timeline' => [
                ['title' => 'Request Received', 'desc' => 'Logged into campus emergency triage system', 'time' => date('g:i A', strtotime('-35 minutes')), 'done' => true],
                ['title' => 'Clinic Triage Review', 'desc' => 'Urgent breathing concern flagged for dispatch', 'time' => date('g:i A', strtotime('-30 minutes')), 'done' => true],
                ['title' => 'Responder Assigned', 'desc' => 'Pending available staff dispatch', 'time' => 'Awaiting dispatch', 'done' => false],
                ['title' => 'En Route to Location', 'desc' => 'Transit to Science Complex Lab 302', 'time' => 'Pending', 'done' => false],
                ['title' => 'Care & Resolution', 'desc' => 'Assessment & treatment', 'time' => 'Pending', 'done' => false]
            ]
        ],
        [
            'id' => 'MA-2026-1043',
            'student_name' => 'Taylor Smith',
            'student_phone' => '(555) 441-9923',
            'issue' => 'Injury',
            'details' => 'Twisted ankle during basketball practice. Swelling and inability to bear weight.',
            'location' => 'Campus Recreation • Gymnasium Court B',
            'urgency' => 'Medium',
            'status' => 'Responder assigned',
            'created' => date('M j, Y • g:i A', strtotime('-1 hour')),
            'created_ts' => time() - 3600,
            'assigned_to' => 'Paramedic Jason Lee (Badge #118)',
            'eta' => '6 mins',
            'notes' => [
                ['by' => 'Paramedic Lee', 'text' => 'Splint kit & ice pack prepared. Heading to recreation center.', 'time' => date('g:i A', strtotime('-25 minutes'))]
            ],
            'timeline' => [
                ['title' => 'Request Received', 'desc' => 'Reported from Gym Court B', 'time' => date('g:i A', strtotime('-60 minutes')), 'done' => true],
                ['title' => 'Clinic Triage Review', 'desc' => 'Non-life threatening extremity trauma', 'time' => date('g:i A', strtotime('-50 minutes')), 'done' => true],
                ['title' => 'Responder Assigned', 'desc' => 'Paramedic Jason Lee assigned', 'time' => date('g:i A', strtotime('-30 minutes')), 'done' => true],
                ['title' => 'En Route to Location', 'desc' => 'Transit in emergency cart', 'time' => 'In transit', 'done' => false],
                ['title' => 'Care & Resolution', 'desc' => 'Splint applied & transport if needed', 'time' => 'Pending', 'done' => false]
            ]
        ],
        [
            'id' => 'MA-2026-1028',
            'student_name' => 'Jordan Rivera',
            'student_phone' => '(555) 670-3490',
            'issue' => 'Injury',
            'details' => 'Minor laceration on forearm from broken glass beaker.',
            'location' => 'Student Union • Food Court Seating Area',
            'urgency' => 'Low',
            'status' => 'Completed',
            'created' => date('M j, Y • g:i A', strtotime('-2 days')),
            'created_ts' => time() - 172800,
            'assigned_to' => 'Officer Davis (Campus First Responder)',
            'eta' => 'Arrived',
            'notes' => [
                ['by' => 'Officer Davis', 'text' => 'Cleaned wound with antiseptic wash, applied sterile dressing. Tetanus status verified.', 'time' => date('g:i A', strtotime('-2 days + 25 minutes'))]
            ],
            'timeline' => [
                ['title' => 'Request Received', 'desc' => 'Logged from Student Union', 'time' => '2:15 PM', 'done' => true],
                ['title' => 'Clinic Triage Review', 'desc' => 'Minor wound care', 'time' => '2:18 PM', 'done' => true],
                ['title' => 'Responder Assigned', 'desc' => 'Officer Davis dispatched', 'time' => '2:20 PM', 'done' => true],
                ['title' => 'En Route to Location', 'desc' => 'Arrived on scene in 4 minutes', 'time' => '2:24 PM', 'done' => true],
                ['title' => 'Care & Resolution', 'desc' => 'Dressing applied, student cleared to return to study', 'time' => '2:40 PM', 'done' => true]
            ]
        ],
        [
            'id' => 'MA-2026-1015',
            'student_name' => 'Samira Khan',
            'student_phone' => '(555) 891-6644',
            'issue' => 'Feeling unwell',
            'details' => 'Mild heat exhaustion and headache during outdoor event.',
            'location' => 'North Residential Quad • Lawn near Hall B',
            'urgency' => 'Low',
            'status' => 'Completed',
            'created' => date('M j, Y • g:i A', strtotime('-3 days')),
            'created_ts' => time() - 259200,
            'assigned_to' => 'Nurse Elena Vance',
            'eta' => 'Arrived',
            'notes' => [
                ['by' => 'Nurse Vance', 'text' => 'Provided cold water, electrolytes, and shaded rest. Vitals normal after 20 mins.', 'time' => date('g:i A', strtotime('-3 days + 40 minutes'))]
            ],
            'timeline' => [
                ['title' => 'Request Received', 'desc' => 'Logged from North Lawn', 'time' => '11:00 AM', 'done' => true],
                ['title' => 'Clinic Triage Review', 'desc' => 'Assessed as heat fatigue', 'time' => '11:05 AM', 'done' => true],
                ['title' => 'Responder Assigned', 'desc' => 'Nurse Vance dispatched', 'time' => '11:10 AM', 'done' => true],
                ['title' => 'En Route to Location', 'desc' => 'Arrived with hydration kit', 'time' => '11:15 AM', 'done' => true],
                ['title' => 'Care & Resolution', 'desc' => 'Student recovered, resting in room', 'time' => '11:45 AM', 'done' => true]
            ]
        ]
    ];
}

// Initialize session data
if (!isset($_SESSION['requests']) || !is_array($_SESSION['requests']) || count($_SESSION['requests']) === 0) {
    $_SESSION['requests'] = getInitialRequests();
}

// Ensure each request has modern fields
foreach ($_SESSION['requests'] as &$item) {
    if (!isset($item['student_name'])) $item['student_name'] = 'Student User';
    if (!isset($item['student_phone'])) $item['student_phone'] = '(555) 012-3456';
    if (!isset($item['assigned_to'])) $item['assigned_to'] = null;
    if (!isset($item['eta'])) $item['eta'] = null;
    if (!isset($item['notes']) || !is_array($item['notes'])) $item['notes'] = [];
    if (!isset($item['timeline']) || !is_array($item['timeline'])) {
        $item['timeline'] = [
            ['title' => 'Request Received', 'desc' => 'Submitted via MedAlert portal', 'time' => $item['created'] ?? date('g:i A'), 'done' => true],
            ['title' => 'Clinic Triage Review', 'desc' => 'Triaged by campus health team', 'time' => 'In progress', 'done' => ($item['status'] !== 'Ongoing')],
            ['title' => 'Responder Assigned', 'desc' => $item['assigned_to'] ? 'Assigned to ' . $item['assigned_to'] : 'Awaiting assignment', 'time' => '', 'done' => in_array($item['status'], ['Responder assigned', 'En route', 'Completed'])],
            ['title' => 'En Route to Location', 'desc' => 'Responder traveling to campus location', 'time' => '', 'done' => in_array($item['status'], ['En route', 'Completed'])],
            ['title' => 'Care & Resolution', 'desc' => 'Response completed', 'time' => '', 'done' => ($item['status'] === 'Completed')]
        ];
    }
}
unset($item);

// Status helper functions
function statusClass($s) {
    switch ($s) {
        case 'Completed': return 'done';
        case 'Responder assigned':
        case 'En route': return 'info';
        case 'Cancelled': return 'cancelled';
        case 'Ongoing':
        default: return 'pending';
    }
}

function urgencyClass($u) {
    switch ($u) {
        case 'High': return 'urg-high';
        case 'Medium': return 'urg-med';
        case 'Low':
        default: return 'urg-low';
    }
}

function badge($s) {
    return '<span class="badge ' . statusClass($s) . '">' . h($s) . '</span>';
}

function urgencyBadge($u) {
    return '<span class="badge ' . urgencyClass($u) . '">' . h($u) . ' Urgency</span>';
}

// Available responders for dispatch
$availableResponders = [
    'Nurse Elena Vance (Badge #402)',
    'Paramedic Jason Lee (Badge #118)',
    'Dr. Aris Thorne (Campus Physician)',
    'Officer Davis (Campus First Responder)',
    'Nurse Sarah Miller (EMT-B)'
];

// Active view
$view = $_GET['view'] ?? 'home';
if (!in_array($view, ['home', 'form', 'sent', 'history', 'admin'], true)) {
    $view = 'home';
}

$historyFilter = $_GET['filter'] ?? 'all';
$toast = $_SESSION['toast'] ?? null;
unset($_SESSION['toast']);

$errors = [];

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // 1. CREATE REQUEST
    if ($action === 'create') {
        $studentName = trim($_POST['student_name'] ?? 'Alex Morgan');
        $studentPhone = trim($_POST['student_phone'] ?? '(555) 234-8831');
        $issue = trim($_POST['issue'] ?? '');
        $location = trim($_POST['location'] ?? '');
        $symptoms = trim($_POST['symptoms'] ?? '');
        $details = trim($_POST['details'] ?? '');
        $urgency = $_POST['urgency'] ?? 'Medium';

        if (!in_array($issue, ['Feeling unwell', 'Injury', 'Pain', 'Breathing concern', 'Allergic reaction', 'Other'], true)) {
            $errors[] = 'Please select a valid concern type.';
        }
        if ($location === '') {
            $errors[] = 'Please enter your current campus location.';
        }
        if (!in_array($urgency, ['Low', 'Medium', 'High'], true)) {
            $urgency = 'Medium';
        }

        if (!$errors) {
            $reqId = 'MA-' . date('Y') . '-' . random_int(1055, 9999);
            $currentTime = date('M j, Y • g:i A');
            $clockTime = date('g:i A');

            $newReq = [
                'id' => $reqId,
                'student_name' => $studentName ?: 'Anonymous Student',
                'student_phone' => $studentPhone ?: 'Not provided',
                'issue' => $issue,
                'details' => $symptoms ?: ($details ?: $issue),
                'location' => $location,
                'urgency' => $urgency,
                'status' => 'Ongoing',
                'created' => $currentTime,
                'created_ts' => time(),
                'assigned_to' => null,
                'eta' => null,
                'notes' => [
                    ['by' => 'System', 'text' => 'Medical request logged. Dispatch alert transmitted to campus clinic desk.', 'time' => $clockTime]
                ],
                'timeline' => [
                    ['title' => 'Request Received', 'desc' => 'Logged into campus emergency triage system', 'time' => $clockTime, 'done' => true],
                    ['title' => 'Clinic Triage Review', 'desc' => 'Assessing severity & available responders', 'time' => 'In queue', 'done' => false],
                    ['title' => 'Responder Assigned', 'desc' => 'Medical staff will be designated', 'time' => 'Pending', 'done' => false],
                    ['title' => 'En Route to Location', 'desc' => 'Approaching ' . $location, 'time' => 'Pending', 'done' => false],
                    ['title' => 'Care & Resolution', 'desc' => 'On-site care & follow-up instructions', 'time' => 'Pending', 'done' => false]
                ]
            ];

            array_unshift($_SESSION['requests'], $newReq);
            $_SESSION['last_id'] = $reqId;
            $_SESSION['toast'] = ['type' => 'success', 'msg' => "Medical request {$reqId} created successfully! Clinic desk notified."];
            header('Location: ?view=sent');
            exit;
        }
        $view = 'form';
    }

    // 2. QUICK SOS / ONE-TAP EMERGENCY ALERT
    if ($action === 'quick_sos') {
        $reqId = 'MA-' . date('Y') . '-' . random_int(9000, 9999);
        $currentTime = date('M j, Y • g:i A');
        $clockTime = date('g:i A');
        $location = trim($_POST['location'] ?? 'Campus Quad / General Vicinity');

        $sosReq = [
            'id' => $reqId,
            'student_name' => 'Campus User (Emergency SOS)',
            'student_phone' => '(555) 911-0000',
            'issue' => 'Immediate Medical Assistance',
            'details' => 'ONE-TAP EMERGENCY SOS TRIGGERED. Immediate dispatch required.',
            'location' => $location,
            'urgency' => 'High',
            'status' => 'Ongoing',
            'created' => $currentTime,
            'created_ts' => time(),
            'assigned_to' => null,
            'eta' => 'Priority 1',
            'notes' => [
                ['by' => 'Emergency Alert', 'text' => 'High-priority SOS trigger received. Audio alarm triggered at clinic desk.', 'time' => $clockTime]
            ],
            'timeline' => [
                ['title' => 'SOS Alert Triggered', 'desc' => 'Direct emergency beacon received by campus safety & clinic', 'time' => $clockTime, 'done' => true],
                ['title' => 'Urgent Dispatch', 'desc' => 'First available mobile responder being routed', 'time' => 'Immediate', 'done' => false],
                ['title' => 'En Route', 'desc' => 'High-speed transit to ' . $location, 'time' => 'Pending', 'done' => false],
                ['title' => 'On Scene', 'desc' => 'Responders arriving on scene', 'time' => 'Pending', 'done' => false]
            ]
        ];

        array_unshift($_SESSION['requests'], $sosReq);
        $_SESSION['last_id'] = $reqId;
        $_SESSION['toast'] = ['type' => 'emergency', 'msg' => "🚨 High-Priority SOS Alert sent! Help is being dispatched."];
        header('Location: ?view=sent');
        exit;
    }

    // 3. UPDATE STATUS (ADMIN / CLINIC)
    if ($action === 'status') {
        $id = $_POST['id'] ?? '';
        $newStatus = $_POST['status'] ?? '';
        $targetView = $_POST['return_view'] ?? 'admin';

        if (in_array($newStatus, ['Ongoing', 'Responder assigned', 'En route', 'Completed', 'Cancelled'], true)) {
            foreach ($_SESSION['requests'] as &$r) {
                if ($r['id'] === $id) {
                    $r['status'] = $newStatus;
                    $clockTime = date('g:i A');

                    // Update timeline accordingly
                    if ($newStatus === 'Responder assigned') {
                        if (!$r['assigned_to']) $r['assigned_to'] = 'Nurse Elena Vance';
                        if (!$r['eta']) $r['eta'] = '5 mins';
                        $r['timeline'][1]['done'] = true;
                        $r['timeline'][2]['done'] = true;
                        $r['timeline'][2]['time'] = $clockTime;
                        $r['timeline'][2]['desc'] = 'Assigned to ' . $r['assigned_to'];
                    } elseif ($newStatus === 'En route') {
                        if (!$r['assigned_to']) $r['assigned_to'] = 'Paramedic Jason Lee';
                        $r['timeline'][1]['done'] = true;
                        $r['timeline'][2]['done'] = true;
                        $r['timeline'][3]['done'] = true;
                        $r['timeline'][3]['time'] = $clockTime;
                        $r['eta'] = '2-4 mins';
                    } elseif ($newStatus === 'Completed') {
                        foreach ($r['timeline'] as &$step) { $step['done'] = true; }
                        $r['timeline'][count($r['timeline'])-1]['time'] = $clockTime;
                        $r['eta'] = 'Completed';
                    } elseif ($newStatus === 'Cancelled') {
                        $r['eta'] = 'Cancelled';
                    }

                    $r['notes'][] = [
                        'by' => 'Clinic Admin',
                        'text' => "Status changed to '{$newStatus}'.",
                        'time' => $clockTime
                    ];
                    break;
                }
            }
            unset($r);
            $_SESSION['toast'] = ['type' => 'info', 'msg' => "Request {$id} status updated to '{$newStatus}'."];
        }
        header("Location: ?view={$targetView}");
        exit;
    }

    // 4. ASSIGN RESPONDER
    if ($action === 'assign_responder') {
        $id = $_POST['id'] ?? '';
        $responder = trim($_POST['responder'] ?? '');
        $eta = trim($_POST['eta'] ?? '5 mins');

        if ($responder) {
            foreach ($_SESSION['requests'] as &$r) {
                if ($r['id'] === $id) {
                    $r['assigned_to'] = $responder;
                    $r['eta'] = $eta;
                    if ($r['status'] === 'Ongoing') {
                        $r['status'] = 'Responder assigned';
                    }
                    $clockTime = date('g:i A');
                    $r['timeline'][1]['done'] = true;
                    $r['timeline'][2]['done'] = true;
                    $r['timeline'][2]['time'] = $clockTime;
                    $r['timeline'][2]['desc'] = 'Assigned to ' . $responder . ' (ETA: ' . $eta . ')';
                    $r['notes'][] = [
                        'by' => 'Dispatch Desk',
                        'text' => "Assigned to {$responder}. Estimated arrival in {$eta}.",
                        'time' => $clockTime
                    ];
                    break;
                }
            }
            unset($r);
            $_SESSION['toast'] = ['type' => 'success', 'msg' => "Assigned {$responder} to {$id}."];
        }
        header('Location: ?view=admin');
        exit;
    }

    // 5. ADD TRIAGE NOTE
    if ($action === 'add_note') {
        $id = $_POST['id'] ?? '';
        $noteText = trim($_POST['note'] ?? '');
        $author = trim($_POST['author'] ?? 'Clinic Desk');
        $returnView = $_POST['return_view'] ?? 'admin';

        if ($id && $noteText) {
            foreach ($_SESSION['requests'] as &$r) {
                if ($r['id'] === $id) {
                    $r['notes'][] = [
                        'by' => $author,
                        'text' => $noteText,
                        'time' => date('g:i A')
                    ];
                    break;
                }
            }
            unset($r);
            $_SESSION['toast'] = ['type' => 'info', 'msg' => "Note added to {$id}."];
        }
        header("Location: ?view={$returnView}");
        exit;
    }

    // 6. CANCEL REQUEST (STUDENT OR CLINIC)
    if ($action === 'cancel_request') {
        $id = $_POST['id'] ?? '';
        $reason = trim($_POST['reason'] ?? 'Cancelled by requester');
        $returnView = $_POST['return_view'] ?? 'history';

        foreach ($_SESSION['requests'] as &$r) {
            if ($r['id'] === $id) {
                $r['status'] = 'Cancelled';
                $r['notes'][] = [
                    'by' => 'Requester',
                    'text' => "Request cancelled. Reason: {$reason}",
                    'time' => date('g:i A')
                ];
                break;
            }
        }
        unset($r);
        $_SESSION['toast'] = ['type' => 'warning', 'msg' => "Request {$id} has been cancelled."];
        header("Location: ?view={$returnView}");
        exit;
    }

    // 7. DELETE REQUEST
    if ($action === 'delete_request') {
        $id = $_POST['id'] ?? '';
        $_SESSION['requests'] = array_values(array_filter($_SESSION['requests'], fn($r) => $r['id'] !== $id));
        $_SESSION['toast'] = ['type' => 'info', 'msg' => "Request {$id} permanently removed from session."];
        header('Location: ?view=admin');
        exit;
    }

    // 8. RESET DEMO DATA
    if ($action === 'reset_demo') {
        $_SESSION['requests'] = getInitialRequests();
        $_SESSION['last_id'] = 'MA-2026-1051';
        $_SESSION['toast'] = ['type' => 'success', 'msg' => 'Demo data restored with fresh sample emergencies!'];
        header('Location: ?view=' . ($_POST['return_view'] ?? 'admin'));
        exit;
    }

    // 9. EXPORT CSV
    if ($action === 'export_csv') {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=medalert_incidents_' . date('Ymd_His') . '.csv');
        $out = fopen('php://output', 'w');
        fputcsv($out, ['ID', 'Student Name', 'Contact Phone', 'Issue', 'Location', 'Urgency', 'Status', 'Assigned Responder', 'Created At', 'Details']);
        foreach ($_SESSION['requests'] as $req) {
            fputcsv($out, [
                $req['id'],
                $req['student_name'] ?? 'N/A',
                $req['student_phone'] ?? 'N/A',
                $req['issue'],
                $req['location'],
                $req['urgency'],
                $req['status'],
                $req['assigned_to'] ?? 'Unassigned',
                $req['created'],
                $req['details']
            ]);
        }
        fclose($out);
        exit;
    }
}

// Current requests snapshot
$requests = $_SESSION['requests'];

// Find the last or most relevant request for home/sent display
$last = null;
if (!empty($_SESSION['last_id'])) {
    foreach ($requests as $r) {
        if ($r['id'] === $_SESSION['last_id']) {
            $last = $r;
            break;
        }
    }
}
if (!$last && !empty($requests)) {
    // Default to the most active/ongoing or first item
    foreach ($requests as $r) {
        if ($r['status'] !== 'Completed' && $r['status'] !== 'Cancelled') {
            $last = $r;
            break;
        }
    }
    if (!$last) $last = $requests[0];
}

// Filtered requests for history view
$filteredRequests = $requests;
if ($historyFilter === 'ongoing') {
    $filteredRequests = array_values(array_filter($requests, fn($r) => in_array($r['status'], ['Ongoing', 'Responder assigned', 'En route'])));
} elseif ($historyFilter === 'completed') {
    $filteredRequests = array_values(array_filter($requests, fn($r) => $r['status'] === 'Completed'));
} elseif ($historyFilter === 'high') {
    $filteredRequests = array_values(array_filter($requests, fn($r) => $r['urgency'] === 'High'));
}

// Calculate summary numbers
$totalCount = count($requests);
$activeCount = count(array_filter($requests, fn($r) => in_array($r['status'], ['Ongoing', 'Responder assigned', 'En route'])));
$highUrgencyCount = count(array_filter($requests, fn($r) => $r['urgency'] === 'High' && $r['status'] !== 'Completed' && $r['status'] !== 'Cancelled'));
$completedCount = count(array_filter($requests, fn($r) => $r['status'] === 'Completed'));

// Encode requests to JSON for client-side modal and instant interactivity
$jsonRequests = json_encode($requests, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MedAlert | Campus Health & Emergency Response</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    :root {
      --navy: #0f1f33;
      --navy-dark: #091321;
      --navy-card: #162a45;
      --teal: #0d9488;
      --teal-hover: #0f766e;
      --teal-soft: #e6f6f4;
      --teal-text: #0b6860;
      --red: #dc2626;
      --red-hover: #b91c1c;
      --red-bg: #fee2e2;
      --amber: #d97706;
      --amber-bg: #fef3c7;
      --blue: #2563eb;
      --blue-bg: #dbeafe;
      --green: #16a34a;
      --green-bg: #dcfce7;
      --purple: #7c3aed;
      --purple-bg: #ede9fe;
      --gray-50: #f8fafc;
      --gray-100: #f1f5f9;
      --gray-200: #e2e8f0;
      --gray-300: #cbd5e1;
      --gray-400: #94a3b8;
      --gray-500: #64748b;
      --gray-600: #475569;
      --gray-700: #334155;
      --gray-800: #1e293b;
      --gray-900: #0f172a;
      --line: #e2e8f0;
      --radius-sm: 8px;
      --radius: 14px;
      --radius-lg: 20px;
      --radius-pill: 9999px;
      --shadow-sm: 0 1px 2px rgba(15, 23, 42, 0.05);
      --shadow: 0 4px 16px -2px rgba(15, 23, 42, 0.08), 0 2px 6px -1px rgba(15, 23, 42, 0.04);
      --shadow-lg: 0 12px 32px -4px rgba(15, 23, 42, 0.14), 0 4px 12px -2px rgba(15, 23, 42, 0.06);
    }

    * { box-sizing: border-box; }
    body {
      margin: 0;
      background: var(--gray-50);
      color: var(--gray-800);
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      -webkit-font-smoothing: antialiased;
    }
    a { text-decoration: none; color: inherit; }
    button, input, select, textarea { font-family: inherit; font-size: inherit; }

    /* Buttons */
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      border: 1px solid transparent;
      border-radius: var(--radius-sm);
      padding: 0.75rem 1.15rem;
      font-weight: 600;
      font-size: 0.9rem;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.15s ease-in-out;
      line-height: 1.25;
      white-space: nowrap;
    }
    .btn:hover { transform: translateY(-1px); box-shadow: var(--shadow-sm); }
    .btn:active { transform: translateY(0); }
    .btn-sm { padding: 0.45rem 0.75rem; font-size: 0.8rem; border-radius: 6px; }
    .btn-primary { background: var(--teal); color: #fff; }
    .btn-primary:hover { background: var(--teal-hover); color: #fff; }
    .btn-danger { background: var(--red); color: #fff; }
    .btn-danger:hover { background: var(--red-hover); color: #fff; }
    .btn-dark { background: var(--navy); color: #fff; }
    .btn-dark:hover { background: var(--navy-dark); color: #fff; }
    .btn-light { background: var(--teal-soft); color: var(--teal-text); border: 1px solid #c2ece7; }
    .btn-light:hover { background: #d7f1ee; }
    .btn-outline { background: #fff; border: 1px solid var(--gray-300); color: var(--gray-700); }
    .btn-outline:hover { background: var(--gray-100); border-color: var(--gray-400); color: var(--gray-900); }
    .btn-outline-danger { background: #fff; border: 1px solid #fca5a5; color: var(--red); }
    .btn-outline-danger:hover { background: var(--red-bg); }

    /* Header */
    .top {
      background: var(--navy);
      color: #fff;
      padding: 0.9rem max(1.25rem, calc((100vw - 1200px) / 2));
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
      position: sticky;
      top: 0;
      z-index: 40;
      box-shadow: 0 2px 10px rgba(0,0,0,0.15);
    }
    .brand-wrap { display: flex; align-items: center; gap: 0.75rem; }
    .brand-icon {
      width: 36px;
      height: 36px;
      background: linear-gradient(135deg, #0d9488, #14b8a6);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 900;
      font-size: 1.2rem;
      box-shadow: 0 2px 6px rgba(13,148,136,0.35);
    }
    .brand-text { display: flex; flex-direction: column; }
    .brand { font-size: 1.25rem; font-weight: 800; letter-spacing: -0.03em; color: #fff; line-height: 1.1; }
    .brand span { color: #5eead4; }
    .sub { font-size: 0.62rem; letter-spacing: 0.12em; color: #94a3b8; font-weight: 700; text-transform: uppercase; margin-top: 2px; }
    .nav-actions { display: flex; align-items: center; gap: 0.75rem; }
    .links { display: flex; gap: 0.35rem; align-items: center; }
    .links a {
      padding: 0.55rem 0.85rem;
      border-radius: 8px;
      color: #cbd5e1;
      font-size: 0.875rem;
      font-weight: 600;
      transition: all 0.15s ease;
    }
    .links a:hover, .links a.active { background: #1e3550; color: #ffffff; }
    .links a.active { background: rgba(13, 148, 136, 0.25); color: #5eead4; border: 1px solid rgba(20, 184, 166, 0.3); }

    /* Toast notification */
    .toast-container {
      position: fixed;
      top: 4.5rem;
      right: 1.5rem;
      z-index: 100;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
      max-width: 420px;
      width: calc(100% - 3rem);
      pointer-events: none;
    }
    .toast {
      pointer-events: auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 0.75rem;
      padding: 0.85rem 1.1rem;
      border-radius: 12px;
      box-shadow: var(--shadow-lg);
      font-size: 0.88rem;
      font-weight: 500;
      animation: slideIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .toast-success { background: #065f46; color: #fff; border-left: 5px solid #34d399; }
    .toast-info { background: #1e3a8a; color: #fff; border-left: 5px solid #60a5fa; }
    .toast-warning { background: #78350f; color: #fff; border-left: 5px solid #f59e0b; }
    .toast-emergency { background: #991b1b; color: #fff; border-left: 5px solid #f87171; animation: pulseRed 1s infinite alternate; }
    .toast-close { background: none; border: 0; color: rgba(255,255,255,0.7); font-size: 1.1rem; cursor: pointer; padding: 0 0.25rem; }
    .toast-close:hover { color: #fff; }

    /* Layout Container */
    .wrap {
      width: min(1200px, 100% - 2.5rem);
      margin: 2rem auto 5rem;
    }
    .eyebrow {
      color: var(--teal);
      font-size: 0.75rem;
      font-weight: 800;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      margin-bottom: 0.25rem;
    }
    h1 { font-size: clamp(1.6rem, 2.8vw, 2.2rem); font-weight: 800; letter-spacing: -0.03em; margin: 0.25rem 0 0.5rem; color: var(--navy); }
    h2 { font-size: 1.25rem; font-weight: 700; margin: 0 0 1rem; color: var(--navy); }
    p { line-height: 1.6; margin: 0 0 1rem; }
    .muted { color: var(--gray-500); }
    .small { font-size: 0.82rem; }

    /* Grid & Cards */
    .grid { display: grid; gap: 1.25rem; }
    .cols { grid-template-columns: minmax(0, 1.2fr) minmax(320px, 0.9fr); }
    .card {
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--radius);
      padding: 1.5rem;
      box-shadow: var(--shadow);
    }

    /* Hero Banner */
    .hero {
      background: linear-gradient(135deg, #0e1e32 0%, #152d4c 100%);
      color: #fff;
      border-radius: var(--radius-lg);
      padding: clamp(1.5rem, 4vw, 2.5rem);
      position: relative;
      overflow: hidden;
      border: 1px solid #233d60;
      box-shadow: var(--shadow-lg);
    }
    .hero::after {
      content: '';
      position: absolute;
      right: -50px;
      bottom: -50px;
      width: 250px;
      height: 250px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(13,148,136,0.18) 0%, transparent 70%);
      pointer-events: none;
    }
    .hero .eyebrow { color: #5eead4; }
    .hero h2 { font-size: clamp(1.8rem, 3.5vw, 2.6rem); color: #fff; line-height: 1.15; max-width: 520px; margin: 0.5rem 0 0.85rem; }
    .hero p { color: #cbd5e1; max-width: 500px; font-size: 0.98rem; }
    .hero-actions { display: flex; gap: 0.75rem; flex-wrap: wrap; margin-top: 1.25rem; }

    /* Stats Grid */
    .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem; margin-top: 1.25rem; }
    .stat {
      background: #fff;
      border: 1px solid var(--gray-200);
      border-radius: var(--radius);
      padding: 1.2rem;
      box-shadow: var(--shadow-sm);
      display: flex;
      flex-direction: column;
      gap: 0.25rem;
      cursor: pointer;
      transition: all 0.15s ease;
    }
    .stat:hover { border-color: var(--teal); transform: translateY(-2px); box-shadow: var(--shadow); }
    .stat strong { font-size: 1.7rem; font-weight: 800; color: var(--navy); line-height: 1.1; }
    .stat span { font-size: 0.82rem; font-weight: 600; color: var(--gray-500); text-transform: uppercase; letter-spacing: 0.04em; }

    /* Badges */
    .badge {
      display: inline-flex;
      align-items: center;
      gap: 0.35rem;
      padding: 0.3rem 0.65rem;
      border-radius: var(--radius-pill);
      font-size: 0.75rem;
      font-weight: 700;
      white-space: nowrap;
      line-height: 1.2;
    }
    .badge::before {
      content: '';
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: currentColor;
    }
    .done { background: var(--green-bg); color: var(--green); }
    .pending { background: var(--amber-bg); color: var(--amber); }
    .info { background: var(--blue-bg); color: var(--blue); }
    .cancelled { background: var(--gray-200); color: var(--gray-600); }
    .urg-high { background: var(--red-bg); color: var(--red); }
    .urg-med { background: var(--amber-bg); color: var(--amber); }
    .urg-low { background: var(--teal-soft); color: var(--teal-text); }

    /* Pulse beacon for high urgency */
    .beacon {
      position: relative;
    }
    .beacon::after {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      border-radius: 9999px;
      border: 2px solid var(--red);
      animation: ripple 1.6s infinite ease-out;
      pointer-events: none;
    }

    /* Request list and cards */
    .request-list { display: grid; gap: 0.85rem; }
    .request {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1.25rem;
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--radius);
      padding: 1.2rem 1.4rem;
      box-shadow: var(--shadow-sm);
      transition: all 0.15s ease;
      cursor: pointer;
    }
    .request:hover {
      border-color: var(--teal);
      box-shadow: var(--shadow);
      transform: translateY(-2px);
    }
    .request-main { display: flex; flex-direction: column; gap: 0.3rem; }
    .request h3 { font-size: 1.05rem; font-weight: 700; margin: 0; color: var(--navy); }
    .rid { font-size: 0.75rem; font-weight: 800; color: var(--gray-400); letter-spacing: 0.05em; }
    .request-right { display: flex; flex-direction: column; align-items: flex-end; gap: 0.5rem; text-align: right; }

    /* Interactive Timeline */
    .timeline { display: grid; gap: 0.9rem; margin: 1.25rem 0; position: relative; }
    .timeline::before {
      content: '';
      position: absolute;
      top: 10px;
      bottom: 20px;
      left: 6px;
      width: 2px;
      background: var(--gray-200);
      z-index: 1;
    }
    .step {
      display: flex;
      align-items: flex-start;
      gap: 0.9rem;
      position: relative;
      z-index: 2;
    }
    .dot {
      width: 14px;
      height: 14px;
      border-radius: 50%;
      background: var(--gray-300);
      margin-top: 0.2rem;
      flex-shrink: 0;
      box-shadow: 0 0 0 4px #fff;
      transition: all 0.2s ease;
    }
    .step.active .dot {
      background: var(--teal);
      box-shadow: 0 0 0 4px var(--teal-soft);
    }
    .step.done .dot {
      background: var(--green);
      box-shadow: 0 0 0 4px var(--green-bg);
    }
    .step p { margin: 0.15rem 0 0; font-size: 0.82rem; color: var(--gray-500); }
    .step-time { font-size: 0.75rem; font-weight: 600; color: var(--gray-400); }

    /* Form Styles */
    .formgrid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
    .field { display: flex; flex-direction: column; gap: 0.45rem; }
    .full { grid-column: 1 / -1; }
    label { font-size: 0.88rem; font-weight: 700; color: var(--gray-700); }
    input, select, textarea {
      width: 100%;
      border: 1px solid var(--gray-300);
      border-radius: 10px;
      padding: 0.8rem 0.95rem;
      background: white;
      color: var(--gray-800);
      transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }
    input:focus, select:focus, textarea:focus {
      outline: none;
      border-color: var(--teal);
      box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.18);
    }
    textarea { min-height: 95px; resize: vertical; }

    /* Symptom chips */
    .chips { display: flex; gap: 0.5rem; flex-wrap: wrap; margin-top: 0.4rem; }
    .chip {
      background: var(--gray-100);
      border: 1px solid var(--gray-300);
      border-radius: var(--radius-pill);
      padding: 0.4rem 0.85rem;
      font-size: 0.8rem;
      font-weight: 600;
      color: var(--gray-700);
      cursor: pointer;
      transition: all 0.15s ease;
    }
    .chip:hover {
      background: var(--teal-soft);
      border-color: var(--teal);
      color: var(--teal-text);
      transform: translateY(-1px);
    }

    /* Urgency Radio Grid */
    .urgency-selector { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.75rem; }
    .urg-option {
      border: 2px solid var(--gray-200);
      border-radius: 12px;
      padding: 1rem;
      background: #fff;
      display: flex;
      flex-direction: column;
      gap: 0.35rem;
      cursor: pointer;
      transition: all 0.15s ease;
      position: relative;
    }
    .urg-option:hover { border-color: var(--gray-400); }
    .urg-option input[type="radio"] { position: absolute; opacity: 0; pointer-events: none; }
    .urg-option.selected-low { border-color: var(--teal); background: #f0fdfa; }
    .urg-option.selected-med { border-color: var(--amber); background: #fffbeb; }
    .urg-option.selected-high { border-color: var(--red); background: #fef2f2; }
    .urg-title { font-weight: 700; font-size: 0.95rem; display: flex; align-items: center; justify-content: space-between; }
    .urg-desc { font-size: 0.78rem; color: var(--gray-500); line-height: 1.35; }

    /* Filter Pills */
    .pills { display: flex; gap: 0.5rem; flex-wrap: wrap; margin: 1.25rem 0; align-items: center; }
    .pill {
      padding: 0.55rem 1rem;
      border-radius: var(--radius-pill);
      background: white;
      border: 1px solid var(--gray-300);
      font-size: 0.84rem;
      color: var(--gray-600);
      font-weight: 600;
      cursor: pointer;
      transition: all 0.15s ease;
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
    }
    .pill:hover { border-color: var(--teal); color: var(--teal-text); }
    .pill.active { background: var(--teal); border-color: var(--teal); color: white; }
    .pill-count {
      background: rgba(0,0,0,0.08);
      padding: 0.15rem 0.45rem;
      border-radius: 9999px;
      font-size: 0.72rem;
    }
    .pill.active .pill-count { background: rgba(255,255,255,0.25); color: #fff; }

    /* Admin Clinic Dashboard */
    .dash {
      display: grid;
      grid-template-columns: 240px minmax(0, 1fr);
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--radius-lg);
      overflow: hidden;
      box-shadow: var(--shadow-lg);
    }
    .side {
      background: var(--navy);
      padding: 1.5rem 1.1rem;
      color: #cbd5e1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border-right: 1px solid #1e3550;
    }
    .side-brand { display: flex; align-items: center; gap: 0.6rem; margin-bottom: 1.75rem; padding: 0 0.5rem; }
    .side-label {
      font-size: 0.68rem;
      letter-spacing: 0.12em;
      color: #94a3b8;
      text-transform: uppercase;
      font-weight: 700;
      padding: 0.75rem 0.5rem 0.4rem;
    }
    .side-nav { display: flex; flex-direction: column; gap: 0.35rem; }
    .side a.side-link {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.75rem 0.85rem;
      border-radius: 10px;
      font-size: 0.88rem;
      font-weight: 600;
      color: #cbd5e1;
      transition: all 0.15s ease;
    }
    .side a.side-link:hover, .side a.side-link.active { background: #1e3550; color: #fff; }
    .side a.side-link.active { background: rgba(13,148,136,0.3); color: #5eead4; border: 1px solid rgba(20,184,166,0.25); }
    .side-badge { background: #334e68; color: #fff; font-size: 0.7rem; padding: 0.2rem 0.45rem; border-radius: 99px; }
    .side-bottom { margin-top: 2rem; padding: 1rem 0.5rem 0; border-top: 1px solid #1e3550; display: flex; flex-direction: column; gap: 0.65rem; }

    .dashmain { padding: clamp(1.25rem, 3vw, 2.25rem); min-width: 0; }
    .dashhead {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 1rem;
      flex-wrap: wrap;
      margin-bottom: 1.5rem;
      padding-bottom: 1.25rem;
      border-bottom: 1px solid var(--gray-200);
    }
    .dash-actions { display: flex; gap: 0.6rem; flex-wrap: wrap; align-items: center; }

    /* Tables */
    .tablewrap { overflow-x: auto; margin-top: 0.5rem; }
    table { border-collapse: collapse; width: 100%; min-width: 820px; }
    th, td { text-align: left; padding: 1rem 0.85rem; border-bottom: 1px solid var(--gray-200); font-size: 0.86rem; }
    th { background: #f8fafc; color: var(--gray-600); font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; }
    tr:hover td { background: #fcfdfe; }
    .inline-actions { display: flex; gap: 0.4rem; align-items: center; flex-wrap: wrap; }

    /* Modal System */
    .modal-backdrop {
      position: fixed;
      inset: 0;
      background: rgba(15, 23, 42, 0.65);
      backdrop-filter: blur(4px);
      z-index: 1000;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 1.25rem;
      animation: fadeIn 0.15s ease-out;
    }
    .modal-backdrop.open { display: flex; }
    .modal-card {
      background: white;
      border-radius: var(--radius-lg);
      max-width: 620px;
      width: 100%;
      max-height: 90vh;
      overflow-y: auto;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
      border: 1px solid var(--gray-200);
      animation: scaleUp 0.2s cubic-bezier(0.16, 1, 0.3, 1);
      position: relative;
    }
    .modal-header {
      padding: 1.25rem 1.5rem;
      border-bottom: 1px solid var(--gray-200);
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      background: white;
      z-index: 5;
    }
    .modal-header h3 { margin: 0; font-size: 1.2rem; font-weight: 800; color: var(--navy); }
    .modal-close {
      background: none;
      border: none;
      font-size: 1.4rem;
      line-height: 1;
      color: var(--gray-400);
      cursor: pointer;
      padding: 0.25rem;
      border-radius: 6px;
    }
    .modal-close:hover { color: var(--gray-800); background: var(--gray-100); }
    .modal-body { padding: 1.5rem; }
    .modal-footer {
      padding: 1rem 1.5rem;
      border-top: 1px solid var(--gray-200);
      background: var(--gray-50);
      display: flex;
      justify-content: flex-end;
      gap: 0.6rem;
      border-bottom-left-radius: var(--radius-lg);
      border-bottom-right-radius: var(--radius-lg);
    }

    /* Search & Filter Bar */
    .filter-bar {
      display: flex;
      gap: 0.75rem;
      align-items: center;
      flex-wrap: wrap;
      margin-bottom: 1.25rem;
      background: #f8fafc;
      padding: 0.85rem;
      border-radius: 12px;
      border: 1px solid var(--gray-200);
    }
    .filter-search {
      flex: 1;
      min-width: 220px;
      position: relative;
    }
    .filter-search input {
      padding-left: 2.25rem;
    }
    .search-icon {
      position: absolute;
      left: 0.85rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gray-400);
      font-size: 0.95rem;
      pointer-events: none;
    }

    /* Emergency Alert Banner */
    .alert-banner {
      background: linear-gradient(135deg, #fef2f2, #fee2e2);
      border: 1px solid #fecaca;
      border-left: 5px solid var(--red);
      padding: 1rem 1.25rem;
      border-radius: 12px;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
      flex-wrap: wrap;
    }
    .alert-banner-text { display: flex; align-items: center; gap: 0.75rem; }
    .alert-icon { font-size: 1.5rem; color: var(--red); }

    /* Keyframes */
    @keyframes slideIn { from { transform: translateY(-20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    @keyframes scaleUp { from { transform: scale(0.95); opacity: 0; } to { transform: scale(1); opacity: 1; } }
    @keyframes ripple { 0% { transform: scale(1); opacity: 0.8; } 100% { transform: scale(1.6); opacity: 0; } }
    @keyframes pulseRed { 0% { box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.4); } 100% { box-shadow: 0 0 0 10px rgba(220, 38, 38, 0); } }

    /* Mobile Nav */
    .mobile-nav { display: none; }
    .foot { text-align: center; font-size: 0.78rem; color: var(--gray-500); padding: 1.5rem 1rem 3rem; }

    /* Responsive */
    @media (max-width: 860px) {
      .top { padding: 0.75rem 1rem; }
      .links { display: none; }
      .wrap { width: 100%; padding: 1rem; margin: 0 auto 5rem; }
      .cols, .dash { grid-template-columns: 1fr; }
      .side { display: none; }
      .dashmain { padding: 1rem; }
      .formgrid { grid-template-columns: 1fr; }
      .full { grid-column: auto; }
      .urgency-selector { grid-template-columns: 1fr; }
      .stats { grid-template-columns: repeat(2, 1fr); }
      .mobile-nav {
        display: grid;
        position: fixed;
        z-index: 50;
        bottom: 0;
        left: 0;
        right: 0;
        grid-template-columns: repeat(5, 1fr);
        background: white;
        border-top: 1px solid var(--line);
        padding: 0.45rem 0.25rem calc(0.45rem + env(safe-area-inset-bottom));
        box-shadow: 0 -4px 12px rgba(0,0,0,0.06);
      }
      .mobile-nav a, .mobile-nav button {
        background: none;
        border: none;
        text-align: center;
        color: var(--gray-500);
        font-size: 0.72rem;
        padding: 0.4rem 0.15rem;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.2rem;
        cursor: pointer;
        font-weight: 600;
      }
      .mobile-nav a.active { color: var(--teal); background: var(--teal-soft); font-weight: 800; }
      .mobile-nav .sos-nav-btn { color: var(--red); font-weight: 800; }
      .request { align-items: flex-start; padding: 1rem; }
    }
  </style>
</head>
<body>

<!-- Header -->
<header class="top">
  <div class="brand-wrap">
    <div class="brand-icon">✚</div>
    <div class="brand-text">
      <a class="brand" href="?view=home">Med<span>Alert</span></a>
      <div class="sub">CAMPUS EMERGENCY & HEALTH RESPONSE</div>
    </div>
  </div>

  <nav class="links">
    <a class="<?= $view === 'home' ? 'active' : '' ?>" href="?view=home">Student Portal</a>
    <a class="<?= $view === 'form' ? 'active' : '' ?>" href="?view=form">+ New Request</a>
    <a class="<?= $view === 'history' ? 'active' : '' ?>" href="?view=history">Request History</a>
    <a class="<?= $view === 'admin' ? 'active' : '' ?>" href="?view=admin">
      Clinic Dashboard
      <?php if ($activeCount > 0): ?>
        <span class="badge urg-high" style="margin-left: 0.35rem; font-size: 0.65rem; padding: 0.15rem 0.45rem;"><?= $activeCount ?></span>
      <?php endif; ?>
    </a>
  </nav>

  <div class="nav-actions">
    <!-- Quick Emergency Dial Button -->
    <button class="btn btn-sm btn-danger beacon" onclick="openEmergencyModal()" title="Emergency Hotlines & 1-Tap Dial">
      🚨 Emergency Hotline
    </button>
  </div>
</header>

<!-- Toast System -->
<?php if ($toast): ?>
  <div class="toast-container" id="toastContainer">
    <div class="toast toast-<?= h($toast['type']) ?>">
      <div><?= h($toast['msg']) ?></div>
      <button class="toast-close" onclick="this.closest('.toast').remove()">×</button>
    </div>
  </div>
  <script>
    setTimeout(() => {
      const tc = document.getElementById('toastContainer');
      if (tc) tc.style.transition = 'opacity 0.4s', tc.style.opacity = '0', setTimeout(() => tc.remove(), 400);
    }, 4500);
  </script>
<?php endif; ?>

<main class="wrap">

  <!-- ========================================== -->
  <!-- 1. STUDENT HOME VIEW                       -->
  <!-- ========================================== -->
  <?php if ($view === 'home'): ?>
    <div style="margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1rem;">
      <div>
        <div class="eyebrow">Student Health Portal</div>
        <h1>Campus Medical Support</h1>
        <p class="muted" style="margin: 0;">Instant triage, live first-responder dispatch, and direct clinic assistance on campus.</p>
      </div>
      <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
        <button class="btn btn-outline btn-sm" onclick="openEmergencyModal()">📞 Campus Hotlines</button>
        <button class="btn btn-outline-danger btn-sm" onclick="openSosModal()">⚡ 1-Tap SOS Beacon</button>
      </div>
    </div>

    <div class="grid cols">
      <!-- Hero Action Card -->
      <section class="hero">
        <div class="eyebrow">NEED IMMEDIATE ASSISTANCE?</div>
        <h2>Request campus medical response now.</h2>
        <p>Send your exact building, symptoms, and urgency directly to the campus health center for on-scene medical help.</p>
        <div class="hero-actions">
          <a class="btn btn-primary" href="?view=form">Start Medical Request →</a>
          <button class="btn btn-danger" onclick="openSosModal()">🚨 One-Tap Emergency SOS</button>
        </div>
      </section>

      <!-- Active / Last Request Status Card -->
      <section class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.85rem;">
          <h2 style="margin: 0;">Current Response Status</h2>
          <?php if ($last): ?>
            <?= badge($last['status']) ?>
          <?php endif; ?>
        </div>

        <?php if ($last): ?>
          <div style="background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: 12px; padding: 1rem; margin-bottom: 1rem;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <span class="rid"><?= h($last['id']) ?></span>
              <?= urgencyBadge($last['urgency']) ?>
            </div>
            <h3 style="margin: 0.4rem 0 0.2rem; font-size: 1.1rem; color: var(--navy);"><?= h($last['issue']) ?></h3>
            <p class="small muted" style="margin: 0;">📍 <?= h($last['location']) ?></p>

            <?php if ($last['assigned_to']): ?>
              <div style="margin-top: 0.6rem; padding-top: 0.6rem; border-top: 1px dashed var(--gray-300); font-size: 0.82rem;">
                <strong>Assigned:</strong> <?= h($last['assigned_to']) ?>
                <?php if ($last['eta']): ?>
                  <span class="badge info" style="margin-left: 0.4rem;">ETA: <?= h($last['eta']) ?></span>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>

          <!-- Timeline Steps -->
          <div class="timeline">
            <?php foreach ($last['timeline'] as $step): ?>
              <div class="step <?= $step['done'] ? 'done' : '' ?>">
                <span class="dot"></span>
                <div>
                  <div style="display: flex; justify-content: space-between; align-items: baseline; gap: 0.5rem;">
                    <strong style="font-size: 0.88rem; color: var(--navy);"><?= h($step['title']) ?></strong>
                    <span class="step-time"><?= h($step['time']) ?></span>
                  </div>
                  <p><?= h($step['desc']) ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-top: 1.25rem;">
            <button class="btn btn-light btn-sm" onclick="showRequestModal('<?= h($last['id']) ?>')">
              👁 View Full Incident Details
            </button>
            <a class="btn btn-outline btn-sm" href="?view=history">All Past Requests</a>
            <?php if ($last['status'] !== 'Completed' && $last['status'] !== 'Cancelled'): ?>
              <button class="btn btn-outline-danger btn-sm" onclick="openCancelModal('<?= h($last['id']) ?>')">
                ✕ Cancel Request
              </button>
            <?php endif; ?>
          </div>
        <?php else: ?>
          <div style="text-align: center; padding: 2rem 1rem; color: var(--gray-500);">
            <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">📋</div>
            <p>No active requests in this session.</p>
            <a class="btn btn-primary btn-sm" href="?view=form">+ Submit a new request</a>
          </div>
        <?php endif; ?>
      </section>
    </div>

    <!-- Quick Emergency Contact Grid -->
    <div style="margin-top: 2rem;">
      <h2>Immediate Campus Emergency Services</h2>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1rem;">
        <div class="card" style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem;">
          <div>
            <strong style="display: block; font-size: 1rem; color: var(--navy);">Campus Police & Security</strong>
            <span class="small muted">24/7 Security Dispatch & Rapid Escort</span>
          </div>
          <a class="btn btn-danger btn-sm" href="tel:5550199">📞 (555) 0199</a>
        </div>
        <div class="card" style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem;">
          <div>
            <strong style="display: block; font-size: 1rem; color: var(--navy);">Student Health Center</strong>
            <span class="small muted">Clinic Triage & Registered Nurse Desk</span>
          </div>
          <a class="btn btn-primary btn-sm" href="tel:5550144">📞 (555) 0144</a>
        </div>
        <div class="card" style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem;">
          <div>
            <strong style="display: block; font-size: 1rem; color: var(--navy);">Mental Health Crisis Line</strong>
            <span class="small muted">Confidential 24/7 Counselor On-Call</span>
          </div>
          <a class="btn btn-outline btn-sm" href="tel:5550188">📞 (555) 0188</a>
        </div>
      </div>
    </div>

    <!-- Stats overview -->
    <div class="stats">
      <div class="stat" onclick="location.href='?view=history'">
        <strong><?= $totalCount ?></strong>
        <span>Total Logged Requests</span>
      </div>
      <div class="stat" onclick="location.href='?view=history&filter=ongoing'">
        <strong style="color: <?= $activeCount > 0 ? 'var(--amber)' : 'inherit' ?>;"><?= $activeCount ?></strong>
        <span>Active & En Route</span>
      </div>
      <div class="stat" onclick="location.href='?view=history&filter=completed'">
        <strong style="color: var(--green);"><?= $completedCount ?></strong>
        <span>Resolved Incidents</span>
      </div>
      <div class="stat" onclick="openEmergencyModal()">
        <strong>24/7</strong>
        <span>Clinic Triage Active</span>
      </div>
    </div>


  <!-- ========================================== -->
  <!-- 2. NEW REQUEST FORM VIEW                   -->
  <!-- ========================================== -->
  <?php elseif ($view === 'form'): ?>
    <div style="margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
      <div>
        <div class="eyebrow">Assistance Intake</div>
        <h1>Request Medical Assistance</h1>
        <p class="muted" style="margin: 0;">Provide your location and symptoms so the on-duty medical response team can triage effectively.</p>
      </div>
      <div style="display: flex; gap: 0.5rem;">
        <button type="button" class="btn btn-outline btn-sm" onclick="fillSampleForm('asthma')">⚡ Fill Sample (Asthma)</button>
        <button type="button" class="btn btn-outline btn-sm" onclick="fillSampleForm('injury')">⚡ Fill Sample (Sprain)</button>
      </div>
    </div>

    <?php if ($errors): ?>
      <div class="alert-banner" style="background: #fef2f2; border-color: #fca5a5;">
        <div class="alert-banner-text">
          <span class="alert-icon">⚠️</span>
          <div>
            <strong>Please correct the following:</strong>
            <ul style="margin: 0.25rem 0 0; padding-left: 1.25rem; font-size: 0.85rem;">
              <?php foreach ($errors as $err): ?>
                <li><?= h($err) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <form class="card" method="post" action="?view=form" id="medicalRequestForm">
      <input type="hidden" name="action" value="create">

      <div class="formgrid">
        <!-- Requester Info -->
        <div class="field">
          <label for="student_name">Your Name</label>
          <input id="student_name" name="student_name" value="Alex Morgan" placeholder="e.g. Alex Morgan" required>
        </div>

        <div class="field">
          <label for="student_phone">Contact Phone Number</label>
          <input id="student_phone" name="student_phone" value="(555) 234-8831" placeholder="e.g. (555) 234-8831" required>
        </div>

        <!-- Issue type -->
        <div class="field">
          <label for="issue">Primary Concern / Issue Type</label>
          <select id="issue" name="issue" required onchange="updateUrgencyRecommendation(this.value)">
            <option value="">-- Select an issue type --</option>
            <option value="Feeling unwell">Feeling unwell / Dizziness / Nausea</option>
            <option value="Injury">Physical Injury / Fall / Fracture</option>
            <option value="Pain">Severe Pain / Acute Discomfort</option>
            <option value="Breathing concern">Breathing concern / Asthma attack</option>
            <option value="Allergic reaction">Allergic reaction / Swelling</option>
            <option value="Other">Other Medical Issue</option>
          </select>
          <div class="chips">
            <span class="chip" onclick="quickSelectConcern('Breathing concern', 'High', 'Shortness of breath and wheezing.')">🫁 Asthma Flare</span>
            <span class="chip" onclick="quickSelectConcern('Injury', 'Medium', 'Sprained ankle with severe swelling.')">🩹 Sprained Ankle</span>
            <span class="chip" onclick="quickSelectConcern('Feeling unwell', 'High', 'Lightheadedness, dizziness, and cold sweats.')">😵 Dizziness / Faint</span>
            <span class="chip" onclick="quickSelectConcern('Allergic reaction', 'High', 'Hives, facial itching, and lip swelling.')">⚠️ Allergic Reaction</span>
          </div>
        </div>

        <!-- Location -->
        <div class="field">
          <div style="display: flex; justify-content: space-between; align-items: center;">
            <label for="location">Exact Campus Location</label>
            <button type="button" class="btn btn-outline btn-sm" style="padding: 0.2rem 0.5rem; font-size: 0.75rem;" onclick="detectLocation()">
              📍 Use My Location
            </button>
          </div>
          <input id="location" name="location" placeholder="e.g. Science Complex • 3rd Floor Lab 302" required>
          <div class="chips">
            <span class="chip" onclick="setLocation('Main Campus • Library 2nd Floor Quiet Study')">📚 Library 2nd Fl</span>
            <span class="chip" onclick="setLocation('Science Complex • Lab 302')">🔬 Science Lab 302</span>
            <span class="chip" onclick="setLocation('Campus Recreation • Gymnasium Court B')">🏀 Gym Court B</span>
            <span class="chip" onclick="setLocation('Student Union • Main Dining Area')">🍔 Student Union</span>
            <span class="chip" onclick="setLocation('North Dormitories • Quad Lawn')">🏢 North Quad</span>
          </div>
        </div>

        <!-- Symptoms -->
        <div class="field full">
          <label for="symptoms">Symptoms or What is Happening</label>
          <textarea id="symptoms" name="symptoms" placeholder="Describe symptoms: e.g. when it started, severity, whether you can walk or sit comfortably..."></textarea>
        </div>

        <!-- Urgency Selection -->
        <div class="field full">
          <label>Urgency Level</label>
          <div class="urgency-selector" id="urgencySelector">
            <label class="urg-option" id="opt-low" onclick="selectUrgency('Low')">
              <input type="radio" name="urgency" value="Low">
              <div class="urg-title">
                <span>🟢 Low Urgency</span>
                <span class="badge urg-low">Routine</span>
              </div>
              <div class="urg-desc">Minor cuts, mild headache, advice, non-urgent assistance.</div>
            </label>

            <label class="urg-option selected-med" id="opt-med" onclick="selectUrgency('Medium')">
              <input type="radio" name="urgency" value="Medium" checked>
              <div class="urg-title">
                <span>🟡 Medium Urgency</span>
                <span class="badge urg-med">Standard</span>
              </div>
              <div class="urg-desc">Sprains, persistent dizziness, moderate bleeding, severe nausea.</div>
            </label>

            <label class="urg-option" id="opt-high" onclick="selectUrgency('High')">
              <input type="radio" name="urgency" value="High">
              <div class="urg-title">
                <span>🔴 High Urgency</span>
                <span class="badge urg-high">Critical</span>
              </div>
              <div class="urg-desc">Chest pain, breathing distress, unconsciousness, severe trauma.</div>
            </label>
          </div>
        </div>

        <!-- Additional details -->
        <div class="field full">
          <label for="details">Additional Notes for Responders (Optional)</label>
          <textarea id="details" name="details" placeholder="Any access codes, allergies, emergency contacts, or landmarks to help responders find you quickly..."></textarea>
        </div>
      </div>

      <div style="display: flex; gap: 0.85rem; flex-wrap: wrap; margin-top: 1.5rem; align-items: center;">
        <button class="btn btn-primary" type="submit" id="submitRequestBtn">
          Send Medical Request →
        </button>
        <a class="btn btn-outline" href="?view=home">Cancel</a>
        <span class="small muted" style="margin-left: auto;">
          🔒 Saved to local session demo. Clinic triage simulated.
        </span>
      </div>
    </form>


  <!-- ========================================== -->
  <!-- 3. REQUEST SENT CONFIRMATION VIEW          -->
  <!-- ========================================== -->
  <?php elseif ($view === 'sent'): ?>
    <section class="card" style="max-width: 760px; margin: 2rem auto; padding: clamp(1.5rem, 5vw, 3rem); text-align: center;">
      <div style="width: 76px; height: 76px; margin: 0 auto 1.25rem; background: var(--green-bg); color: var(--green); display: grid; place-items: center; border-radius: 50%; font-size: 2.2rem; box-shadow: 0 0 0 8px #f0fdf4;">
        ✓
      </div>

      <div class="eyebrow">Request Dispatched</div>
      <h1>Medical Response Requested!</h1>
      <p class="muted">Your alert has been received by the campus health center triage desk.</p>

      <?php if ($last): ?>
        <div style="background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: var(--radius); padding: 1.25rem 1.5rem; text-align: left; margin: 1.75rem 0;">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
            <div>
              <span class="small muted">INCIDENT REFERENCE</span>
              <div style="font-size: 1.25rem; font-weight: 800; color: var(--navy);"><?= h($last['id']) ?></div>
            </div>
            <?= urgencyBadge($last['urgency']) ?>
          </div>

          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 0.75rem; margin-top: 0.75rem; padding-top: 0.75rem; border-top: 1px solid var(--gray-200);">
            <div>
              <span class="small muted" style="display: block;">Primary Concern</span>
              <strong><?= h($last['issue']) ?></strong>
            </div>
            <div>
              <span class="small muted" style="display: block;">Current Location</span>
              <strong><?= h($last['location']) ?></strong>
            </div>
            <div>
              <span class="small muted" style="display: block;">Requester</span>
              <strong><?= h($last['student_name']) ?></strong>
            </div>
            <div>
              <span class="small muted" style="display: block;">Current Status</span>
              <div><?= badge($last['status']) ?></div>
            </div>
          </div>
        </div>

        <div class="timeline" style="text-align: left;">
          <?php foreach ($last['timeline'] as $step): ?>
            <div class="step <?= $step['done'] ? 'done' : '' ?>">
              <span class="dot"></span>
              <div>
                <div style="display: flex; justify-content: space-between; align-items: baseline; gap: 0.5rem;">
                  <strong style="font-size: 0.88rem; color: var(--navy);"><?= h($step['title']) ?></strong>
                  <span class="step-time"><?= h($step['time']) ?></span>
                </div>
                <p><?= h($step['desc']) ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <div style="display: flex; justify-content: center; gap: 0.75rem; flex-wrap: wrap; margin-top: 2rem;">
        <button class="btn btn-primary" onclick="showRequestModal('<?= h($last['id'] ?? '') ?>')">
          👁 Live Tracking Details
        </button>
        <a class="btn btn-outline" href="?view=history">View Request History</a>
        <a class="btn btn-dark" href="?view=home">← Back to Portal</a>
      </div>
    </section>


  <!-- ========================================== -->
  <!-- 4. REQUEST HISTORY VIEW                    -->
  <!-- ========================================== -->
  <?php elseif ($view === 'history'): ?>
    <div style="margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
      <div>
        <div class="eyebrow">Student Medical Records</div>
        <h1>Request History & Status</h1>
        <p class="muted" style="margin: 0;">Review active responses, previous campus health visits, and incident summaries.</p>
      </div>
      <div style="display: flex; gap: 0.5rem;">
        <a class="btn btn-primary btn-sm" href="?view=form">+ New Request</a>
        <button class="btn btn-outline btn-sm" onclick="openEmergencyModal()">🚨 Hotline</button>
      </div>
    </div>

    <!-- Filter Pills (Active & Functional) -->
    <div class="pills">
      <button class="pill <?= $historyFilter === 'all' ? 'active' : '' ?>" onclick="filterHistory('all')">
        All Requests <span class="pill-count"><?= $totalCount ?></span>
      </button>
      <button class="pill <?= $historyFilter === 'ongoing' ? 'active' : '' ?>" onclick="filterHistory('ongoing')">
        Active / Dispatched <span class="pill-count"><?= $activeCount ?></span>
      </button>
      <button class="pill <?= $historyFilter === 'high' ? 'active' : '' ?>" onclick="filterHistory('high')">
        High Urgency <span class="pill-count"><?= $highUrgencyCount ?></span>
      </button>
      <button class="pill <?= $historyFilter === 'completed' ? 'active' : '' ?>" onclick="filterHistory('completed')">
        Completed <span class="pill-count"><?= $completedCount ?></span>
      </button>
    </div>

    <!-- Search Input for instant live filtering -->
    <div class="filter-bar">
      <div class="filter-search">
        <span class="search-icon">🔍</span>
        <input type="text" id="historySearchInput" placeholder="Search by ID, concern, building, or name..." oninput="searchHistoryList(this.value)">
      </div>
      <button class="btn btn-outline btn-sm" onclick="document.getElementById('historySearchInput').value=''; searchHistoryList('')">
        Clear Filter
      </button>
    </div>

    <!-- Request List -->
    <div class="request-list" id="historyRequestList">
      <?php if (empty($filteredRequests)): ?>
        <div class="card" style="text-align: center; padding: 3rem 1rem; color: var(--gray-500);">
          <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">📭</div>
          <h3 style="margin: 0.25rem 0;">No matching requests found</h3>
          <p class="small muted">Try selecting another filter or submit a new emergency request.</p>
          <a class="btn btn-primary btn-sm" href="?view=form" style="margin-top: 0.5rem;">Create New Request</a>
        </div>
      <?php else: ?>
        <?php foreach ($filteredRequests as $r): ?>
          <article class="request" data-id="<?= h($r['id']) ?>" data-search="<?= strtolower(h($r['id'] . ' ' . $r['issue'] . ' ' . $r['location'] . ' ' . $r['student_name'])) ?>" onclick="showRequestModal('<?= h($r['id']) ?>')">
            <div class="request-main">
              <div style="display: flex; align-items: center; gap: 0.6rem;">
                <span class="rid"><?= h($r['id']) ?></span>
                <?= urgencyBadge($r['urgency']) ?>
              </div>
              <h3><?= h($r['issue']) ?></h3>
              <div class="small muted">
                🕒 <?= h($r['created']) ?> · 📍 <?= h($r['location']) ?>
              </div>
              <div class="small" style="color: var(--gray-700); margin-top: 0.2rem;">
                <strong>Requester:</strong> <?= h($r['student_name']) ?>
                <?php if ($r['assigned_to']): ?>
                  · <strong>Responder:</strong> <?= h($r['assigned_to']) ?>
                <?php endif; ?>
              </div>
            </div>

            <div class="request-right">
              <?= badge($r['status']) ?>
              <button class="btn btn-light btn-sm" style="margin-top: 0.5rem;" onclick="event.stopPropagation(); showRequestModal('<?= h($r['id']) ?>')">
                View Details ›
              </button>
            </div>
          </article>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>


  <!-- ========================================== -->
  <!-- 5. CLINIC DISPATCH DASHBOARD (ADMIN)       -->
  <!-- ========================================== -->
  <?php elseif ($view === 'admin'): ?>
    <section class="dash">
      <!-- Admin Sidebar -->
      <aside class="side">
        <div>
          <div class="side-brand">
            <div class="brand-icon" style="width: 28px; height: 28px; font-size: 0.95rem;">✚</div>
            <span style="font-weight: 800; font-size: 1.15rem; color: #fff;">Med<span style="color:#5eead4;">Alert</span></span>
          </div>

          <div class="side-label">Dispatch Operations</div>
          <nav class="side-nav">
            <a class="side-link active" href="?view=admin">
              <span>▦ &nbsp; Live Queue</span>
              <?php if ($activeCount > 0): ?>
                <span class="side-badge" style="background: var(--red);"><?= $activeCount ?></span>
              <?php endif; ?>
            </a>
            <a class="side-link" href="?view=history">
              <span>☷ &nbsp; Full Incident Log</span>
              <span class="side-badge"><?= $totalCount ?></span>
            </a>
            <a class="side-link" href="?view=home">
              <span>↗ &nbsp; Student Portal</span>
            </a>
            <a class="side-link" href="?view=form">
              <span>＋ &nbsp; Intake New Request</span>
            </a>
          </nav>

          <div class="side-label" style="margin-top: 1.25rem;">Quick Responders</div>
          <div style="font-size: 0.78rem; color: #94a3b8; display: flex; flex-direction: column; gap: 0.4rem; padding: 0 0.5rem;">
            <div style="display: flex; justify-content: space-between;">
              <span>• Nurse Vance</span>
              <span style="color: #34d399;">On Scene</span>
            </div>
            <div style="display: flex; justify-content: space-between;">
              <span>• Paramedic Lee</span>
              <span style="color: #60a5fa;">En Route</span>
            </div>
            <div style="display: flex; justify-content: space-between;">
              <span>• Dr. Thorne</span>
              <span style="color: #34d399;">At Clinic</span>
            </div>
          </div>
        </div>

        <div class="side-bottom">
          <form method="post" action="?view=admin" style="margin: 0;">
            <input type="hidden" name="action" value="reset_demo">
            <input type="hidden" name="return_view" value="admin">
            <button type="submit" class="btn btn-outline btn-sm" style="width: 100%; font-size: 0.75rem; background: #1e3550; color: #cbd5e1; border-color: #334e68;" onclick="return confirm('Reset all demo requests back to original defaults?')">
              🔄 Reset Demo Data
            </button>
          </form>
          <div style="font-size: 0.72rem; color: #64748b; text-align: center;">
            MedAlert Clinic Console v2.4
          </div>
        </div>
      </aside>

      <!-- Main Dashboard Content -->
      <section class="dashmain">
        <div class="dashhead">
          <div>
            <div class="eyebrow">Clinic Dispatch Console</div>
            <h1 style="margin: 0.2rem 0;">Emergency Dispatch & Triage</h1>
            <p class="muted" style="margin: 0;">Monitor incoming campus requests, assign responders, and track resolution.</p>
          </div>

          <div class="dash-actions">
            <form method="post" action="?view=admin" style="display: inline;">
              <input type="hidden" name="action" value="export_csv">
              <button type="submit" class="btn btn-outline btn-sm" title="Download incident log as CSV">
                📥 Export CSV
              </button>
            </form>
            <button type="button" class="btn btn-outline btn-sm" onclick="window.print()" title="Print Dashboard">
              🖨 Print Log
            </button>
            <button type="button" class="btn btn-danger btn-sm" onclick="openSosModal()">
              ⚡ Test SOS Alert
            </button>
          </div>
        </div>

        <!-- High Priority Warning Banner if any high urgency is unassigned -->
        <?php if ($highUrgencyCount > 0): ?>
          <div class="alert-banner">
            <div class="alert-banner-text">
              <span class="alert-icon">🚨</span>
              <div>
                <strong style="color: var(--red);">Action Required: <?= $highUrgencyCount ?> High Urgency Incident(s)</strong>
                <div class="small" style="color: #7f1d1d;">Review incoming queue to ensure responder dispatch and ETA confirmation.</div>
              </div>
            </div>
            <button class="btn btn-danger btn-sm" onclick="filterTableByUrgency('High')">View Urgent</button>
          </div>
        <?php endif; ?>

        <!-- Key Stats Cards -->
        <div class="stats" style="margin: 0 0 1.5rem;">
          <div class="stat" onclick="filterTableByStatus('all')">
            <strong><?= $totalCount ?></strong>
            <span>Total Requests</span>
          </div>
          <div class="stat" onclick="filterTableByStatus('active')" style="border-left: 4px solid var(--amber);">
            <strong style="color: var(--amber);"><?= $activeCount ?></strong>
            <span>Active Dispatches</span>
          </div>
          <div class="stat" onclick="filterTableByUrgency('High')" style="border-left: 4px solid var(--red);">
            <strong style="color: var(--red);"><?= $highUrgencyCount ?></strong>
            <span>High Urgency</span>
          </div>
          <div class="stat" onclick="filterTableByStatus('Completed')" style="border-left: 4px solid var(--green);">
            <strong style="color: var(--green);"><?= $completedCount ?></strong>
            <span>Resolved</span>
          </div>
        </div>

        <!-- Dispatch Table Card -->
        <div class="card" style="padding: 1.25rem;">
          <!-- Search & Filter bar -->
          <div class="filter-bar">
            <div class="filter-search">
              <span class="search-icon">🔍</span>
              <input type="text" id="adminTableSearch" placeholder="Filter table by ID, student, concern, location..." oninput="searchAdminTable(this.value)">
            </div>
            <select id="adminStatusFilter" onchange="filterAdminTableSelect(this.value)" style="width: auto; min-width: 140px; padding: 0.55rem 0.8rem;">
              <option value="all">All Statuses</option>
              <option value="Ongoing">Ongoing</option>
              <option value="Responder assigned">Responder assigned</option>
              <option value="En route">En route</option>
              <option value="Completed">Completed</option>
              <option value="Cancelled">Cancelled</option>
            </select>
            <select id="adminUrgencyFilter" onchange="filterAdminTableUrgency(this.value)" style="width: auto; min-width: 130px; padding: 0.55rem 0.8rem;">
              <option value="all">All Urgency</option>
              <option value="High">High Urgency</option>
              <option value="Medium">Medium Urgency</option>
              <option value="Low">Low Urgency</option>
            </select>
          </div>

          <div class="tablewrap">
            <table id="adminRequestsTable">
              <thead>
                <tr>
                  <th>Incident Ref</th>
                  <th>Student / Contact</th>
                  <th>Concern & Location</th>
                  <th>Urgency</th>
                  <th>Status</th>
                  <th>Assigned Responder</th>
                  <th>Quick Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($requests as $r): ?>
                  <tr data-id="<?= h($r['id']) ?>"
                      data-status="<?= h($r['status']) ?>"
                      data-urgency="<?= h($r['urgency']) ?>"
                      data-search="<?= strtolower(h($r['id'] . ' ' . $r['student_name'] . ' ' . $r['issue'] . ' ' . $r['location'] . ' ' . ($r['assigned_to'] ?? ''))) ?>">
                    <td>
                      <button type="button" class="btn btn-outline btn-sm" onclick="showRequestModal('<?= h($r['id']) ?>')">
                        <strong><?= h($r['id']) ?></strong>
                      </button>
                      <span class="small muted" style="display: block; margin-top: 0.25rem; font-size: 0.72rem;">
                        <?= h($r['created']) ?>
                      </span>
                    </td>
                    <td>
                      <strong><?= h($r['student_name']) ?></strong>
                      <span class="small muted" style="display: block; margin-top: 0.15rem;">
                        <a href="tel:<?= preg_replace('/[^0-9]/', '', $r['student_phone']) ?>" style="color: var(--teal); font-weight: 600;">
                          📞 <?= h($r['student_phone']) ?>
                        </a>
                      </span>
                    </td>
                    <td>
                      <strong style="color: var(--navy);"><?= h($r['issue']) ?></strong>
                      <span class="small muted" style="display: block; margin-top: 0.2rem;">
                        📍 <?= h($r['location']) ?>
                      </span>
                    </td>
                    <td>
                      <?= urgencyBadge($r['urgency']) ?>
                    </td>
                    <td>
                      <?= badge($r['status']) ?>
                    </td>
                    <td>
                      <?php if ($r['assigned_to']): ?>
                        <div style="font-weight: 600; font-size: 0.82rem; color: var(--navy);">
                          <?= h($r['assigned_to']) ?>
                        </div>
                        <?php if ($r['eta']): ?>
                          <span class="badge info" style="font-size: 0.68rem; margin-top: 0.2rem;">ETA: <?= h($r['eta']) ?></span>
                        <?php endif; ?>
                      <?php else: ?>
                        <button class="btn btn-outline-danger btn-sm" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;" onclick="openAssignModal('<?= h($r['id']) ?>')">
                          + Assign Staff
                        </button>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="inline-actions">
                        <!-- Quick status updater form -->
                        <form method="post" action="?view=admin" style="margin: 0; display: inline-flex; gap: 0.25rem;">
                          <input type="hidden" name="action" value="status">
                          <input type="hidden" name="id" value="<?= h($r['id']) ?>">
                          <input type="hidden" name="return_view" value="admin">
                          <select name="status" style="width: auto; padding: 0.35rem 0.5rem; font-size: 0.78rem;">
                            <?php foreach (['Ongoing', 'Responder assigned', 'En route', 'Completed', 'Cancelled'] as $s): ?>
                              <option value="<?= h($s) ?>" <?= $r['status'] === $s ? 'selected' : '' ?>><?= h($s) ?></option>
                            <?php endforeach; ?>
                          </select>
                          <button class="btn btn-primary btn-sm" type="submit" title="Update status">
                            Save
                          </button>
                        </form>

                        <!-- Action modal buttons -->
                        <button class="btn btn-outline btn-sm" onclick="openAssignModal('<?= h($r['id']) ?>')" title="Assign / Reassign Staff">
                          👨‍⚕️
                        </button>
                        <button class="btn btn-outline btn-sm" onclick="openNoteModal('<?= h($r['id']) ?>')" title="Add Triage Note">
                          📝
                        </button>
                        <button class="btn btn-outline btn-sm" onclick="showRequestModal('<?= h($r['id']) ?>')" title="View Incident Details">
                          👁
                        </button>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </section>
  <?php endif; ?>

</main>

<!-- Mobile Navigation Bar -->
<nav class="mobile-nav">
  <a class="<?= $view === 'home' ? 'active' : '' ?>" href="?view=home">
    <span style="font-size: 1.1rem;">⌂</span>
    <span>Home</span>
  </a>
  <a class="<?= $view === 'form' ? 'active' : '' ?>" href="?view=form">
    <span style="font-size: 1.1rem;">＋</span>
    <span>Request</span>
  </a>
  <a class="<?= $view === 'history' ? 'active' : '' ?>" href="?view=history">
    <span style="font-size: 1.1rem;">☷</span>
    <span>History</span>
  </a>
  <a class="<?= $view === 'admin' ? 'active' : '' ?>" href="?view=admin">
    <span style="font-size: 1.1rem;">▦</span>
    <span>Clinic</span>
  </a>
  <button class="sos-nav-btn" onclick="openEmergencyModal()">
    <span style="font-size: 1.1rem;">🚨</span>
    <span>SOS</span>
  </button>
</nav>

<footer class="foot">
  MedAlert Campus Emergency & Health Prototype · Session Storage Only · Real emergency? Call 911 immediately.
</footer>


<!-- ======================================================== -->
<!-- MODAL SYSTEM                                            -->
<!-- ======================================================== -->

<!-- 1. INCIDENT DETAILS MODAL -->
<div class="modal-backdrop" id="requestDetailModal">
  <div class="modal-card">
    <div class="modal-header">
      <div>
        <span class="eyebrow" id="modalReqEyebrow">INCIDENT DETAILS</span>
        <h3 id="modalReqId">Incident Details</h3>
      </div>
      <button class="modal-close" onclick="closeModal('requestDetailModal')">×</button>
    </div>
    <div class="modal-body" id="modalReqBody">
      <!-- Injected via JavaScript -->
    </div>
    <div class="modal-footer" id="modalReqFooter">
      <button class="btn btn-outline" onclick="closeModal('requestDetailModal')">Close</button>
    </div>
  </div>
</div>

<!-- 2. EMERGENCY HOTLINES MODAL -->
<div class="modal-backdrop" id="emergencyHotlineModal">
  <div class="modal-card" style="max-width: 520px;">
    <div class="modal-header" style="background: #fef2f2; border-color: #fecaca;">
      <div>
        <span class="eyebrow" style="color: var(--red);">IMMEDIATE ASSISTANCE</span>
        <h3 style="color: var(--red); display: flex; align-items: center; gap: 0.5rem;">
          🚨 Emergency Hotlines
        </h3>
      </div>
      <button class="modal-close" onclick="closeModal('emergencyHotlineModal')">×</button>
    </div>
    <div class="modal-body">
      <p class="small muted" style="margin-bottom: 1.25rem;">
        Click any hotline to dial immediately, or copy the direct response number for your campus:
      </p>

      <div style="display: flex; flex-direction: column; gap: 0.85rem;">
        <div style="background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: 12px; padding: 1rem; display: flex; justify-content: space-between; align-items: center;">
          <div>
            <strong style="color: var(--red); font-size: 1.05rem;">National Emergency Services</strong>
            <div class="small muted">Police, Fire & City Ambulance</div>
          </div>
          <a class="btn btn-danger btn-sm" href="tel:911">📞 Dial 911</a>
        </div>

        <div style="background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: 12px; padding: 1rem; display: flex; justify-content: space-between; align-items: center;">
          <div>
            <strong style="color: var(--navy); font-size: 1.05rem;">Campus Police & Safety</strong>
            <div class="small muted">On-campus rapid squad (555) 0199</div>
          </div>
          <div style="display: flex; gap: 0.35rem;">
            <button class="btn btn-outline btn-sm" onclick="copyToClipboard('(555) 0199')">📋 Copy</button>
            <a class="btn btn-dark btn-sm" href="tel:5550199">📞 Call</a>
          </div>
        </div>

        <div style="background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: 12px; padding: 1rem; display: flex; justify-content: space-between; align-items: center;">
          <div>
            <strong style="color: var(--teal); font-size: 1.05rem;">Student Health Center</strong>
            <div class="small muted">Registered Nurse Triage (555) 0144</div>
          </div>
          <div style="display: flex; gap: 0.35rem;">
            <button class="btn btn-outline btn-sm" onclick="copyToClipboard('(555) 0144')">📋 Copy</button>
            <a class="btn btn-primary btn-sm" href="tel:5550144">📞 Call</a>
          </div>
        </div>

        <div style="background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: 12px; padding: 1rem; display: flex; justify-content: space-between; align-items: center;">
          <div>
            <strong style="color: var(--purple); font-size: 1.05rem;">Crisis Counseling Support</strong>
            <div class="small muted">Confidential Emotional Support (555) 0188</div>
          </div>
          <div style="display: flex; gap: 0.35rem;">
            <button class="btn btn-outline btn-sm" onclick="copyToClipboard('(555) 0188')">📋 Copy</button>
            <a class="btn btn-outline btn-sm" href="tel:5550188" style="color: var(--purple);">📞 Call</a>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('emergencyHotlineModal')">Close</button>
    </div>
  </div>
</div>

<!-- 3. ONE-TAP EMERGENCY SOS MODAL -->
<div class="modal-backdrop" id="sosModal">
  <div class="modal-card" style="max-width: 480px;">
    <div class="modal-header" style="background: #fef2f2; border-color: #fecaca;">
      <div>
        <span class="eyebrow" style="color: var(--red);">HIGH PRIORITY BEACON</span>
        <h3 style="color: var(--red);">🚨 Trigger Campus SOS</h3>
      </div>
      <button class="modal-close" onclick="closeModal('sosModal')">×</button>
    </div>
    <form method="post" action="?view=home">
      <input type="hidden" name="action" value="quick_sos">
      <div class="modal-body">
        <p style="font-weight: 600; color: var(--navy); margin-bottom: 0.5rem;">
          This triggers an immediate high-priority beacon to campus safety & clinic responders.
        </p>
        <p class="small muted" style="margin-bottom: 1.25rem;">
          Use for severe emergencies requiring instant mobile response.
        </p>

        <div class="field">
          <label for="sos_location">Confirm Your Current Location</label>
          <input id="sos_location" name="location" value="Main Campus • Quad / Library Steps" required>
        </div>
      </div>
      <div class="modal-footer" style="background: #fff;">
        <button type="button" class="btn btn-outline" onclick="closeModal('sosModal')">Cancel</button>
        <button type="submit" class="btn btn-danger">🚨 Send Instant SOS Now</button>
      </div>
    </form>
  </div>
</div>

<!-- 4. ASSIGN RESPONDER MODAL (ADMIN) -->
<div class="modal-backdrop" id="assignModal">
  <div class="modal-card" style="max-width: 480px;">
    <div class="modal-header">
      <div>
        <span class="eyebrow">STAFF DISPATCH</span>
        <h3 id="assignModalTitle">Assign Medical Responder</h3>
      </div>
      <button class="modal-close" onclick="closeModal('assignModal')">×</button>
    </div>
    <form method="post" action="?view=admin">
      <input type="hidden" name="action" value="assign_responder">
      <input type="hidden" name="id" id="assignModalReqId" value="">
      <div class="modal-body">
        <div class="field" style="margin-bottom: 1.2rem;">
          <label for="assignResponderSelect">Select Available Responder</label>
          <select id="assignResponderSelect" name="responder" required>
            <?php foreach ($availableResponders as $resp): ?>
              <option value="<?= h($resp) ?>"><?= h($resp) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="field">
          <label for="assignEtaInput">Estimated Arrival Time (ETA)</label>
          <input id="assignEtaInput" name="eta" value="4 mins" placeholder="e.g. 3-5 mins" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline" onclick="closeModal('assignModal')">Cancel</button>
        <button type="submit" class="btn btn-primary">Dispatch Staff →</button>
      </div>
    </form>
  </div>
</div>

<!-- 5. ADD TRIAGE NOTE MODAL -->
<div class="modal-backdrop" id="noteModal">
  <div class="modal-card" style="max-width: 480px;">
    <div class="modal-header">
      <div>
        <span class="eyebrow">INCIDENT LOG</span>
        <h3 id="noteModalTitle">Add Dispatch / Triage Note</h3>
      </div>
      <button class="modal-close" onclick="closeModal('noteModal')">×</button>
    </div>
    <form method="post" action="?view=admin">
      <input type="hidden" name="action" value="add_note">
      <input type="hidden" name="id" id="noteModalReqId" value="">
      <input type="hidden" name="return_view" value="<?= h($view) ?>">
      <div class="modal-body">
        <div class="field" style="margin-bottom: 1rem;">
          <label for="noteAuthor">Logged By</label>
          <input id="noteAuthor" name="author" value="Clinic Triage Desk" required>
        </div>
        <div class="field">
          <label for="noteContent">Note / Update Details</label>
          <textarea id="noteContent" name="note" placeholder="Enter clinical observation, responder location, or follow-up note..." required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline" onclick="closeModal('noteModal')">Cancel</button>
        <button type="submit" class="btn btn-primary">Save Note</button>
      </div>
    </form>
  </div>
</div>

<!-- 6. CANCEL REQUEST MODAL -->
<div class="modal-backdrop" id="cancelModal">
  <div class="modal-card" style="max-width: 460px;">
    <div class="modal-header">
      <div>
        <span class="eyebrow" style="color: var(--amber);">CANCEL REQUEST</span>
        <h3 id="cancelModalTitle">Cancel Medical Request</h3>
      </div>
      <button class="modal-close" onclick="closeModal('cancelModal')">×</button>
    </div>
    <form method="post" action="?view=<?= h($view) ?>">
      <input type="hidden" name="action" value="cancel_request">
      <input type="hidden" name="id" id="cancelModalReqId" value="">
      <input type="hidden" name="return_view" value="<?= h($view) ?>">
      <div class="modal-body">
        <p class="small muted">
          Are you sure you want to cancel this request? Responders will stand down.
        </p>
        <div class="field">
          <label for="cancelReason">Reason for Cancellation</label>
          <select id="cancelReason" name="reason">
            <option value="Resolved on own / Feeling better">Resolved on own / Feeling better</option>
            <option value="Accidental submission">Accidental submission</option>
            <option value="Transported by friend / family">Transported by friend / family</option>
            <option value="Other">Other</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline" onclick="closeModal('cancelModal')">Keep Request</button>
        <button type="submit" class="btn btn-danger">Confirm Cancellation</button>
      </div>
    </form>
  </div>
</div>


<!-- ======================================================== -->
<!-- CLIENT JAVASCRIPT LOGIC                                 -->
<!-- ======================================================== -->
<script>
  // Store all requests in JS for instant modals & filters
  const medAlertRequests = <?= $jsonRequests ?: '[]' ?>;

  function findRequest(id) {
    return medAlertRequests.find(r => r.id === id) || null;
  }

  // Modal open/close functions
  function openModal(id) {
    const el = document.getElementById(id);
    if (el) el.classList.add('open');
  }

  function closeModal(id) {
    const el = document.getElementById(id);
    if (el) el.classList.remove('open');
  }

  // Close modal when clicking on backdrop
  document.querySelectorAll('.modal-backdrop').forEach(modal => {
    modal.addEventListener('click', (e) => {
      if (e.target === modal) closeModal(modal.id);
    });
  });

  // Emergency Modal
  function openEmergencyModal() {
    openModal('emergencyHotlineModal');
  }

  // SOS Modal
  function openSosModal() {
    openModal('sosModal');
  }

  // Cancel Modal
  function openCancelModal(id) {
    document.getElementById('cancelModalReqId').value = id;
    document.getElementById('cancelModalTitle').textContent = `Cancel Request ${id}`;
    openModal('cancelModal');
  }

  // Assign Modal
  function openAssignModal(id) {
    document.getElementById('assignModalReqId').value = id;
    document.getElementById('assignModalTitle').textContent = `Assign Staff to ${id}`;
    openModal('assignModal');
  }

  // Note Modal
  function openNoteModal(id) {
    document.getElementById('noteModalReqId').value = id;
    document.getElementById('noteModalTitle').textContent = `Add Triage Note to ${id}`;
    openModal('noteModal');
  }

  // Request Details Modal
  function showRequestModal(id) {
    const r = findRequest(id);
    if (!r) return;

    document.getElementById('modalReqEyebrow').textContent = `INCIDENT ${r.id}`;
    document.getElementById('modalReqId').textContent = r.issue;

    let notesHtml = '';
    if (r.notes && r.notes.length > 0) {
      notesHtml = `
        <div style="margin-top: 1.25rem;">
          <h4 style="margin: 0 0 0.5rem; font-size: 0.95rem; color: var(--navy);">Dispatch & Clinical Notes</h4>
          <div style="background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: 10px; padding: 0.85rem; display: flex; flex-direction: column; gap: 0.6rem;">
            ${r.notes.map(n => `
              <div style="font-size: 0.82rem; padding-bottom: 0.5rem; border-bottom: 1px dashed var(--gray-300);">
                <div style="display: flex; justify-content: space-between; font-weight: 700; color: var(--gray-700);">
                  <span>${escapeHtml(n.by)}</span>
                  <span class="small muted">${escapeHtml(n.time)}</span>
                </div>
                <div style="margin-top: 0.2rem; color: var(--gray-800);">${escapeHtml(n.text)}</div>
              </div>
            `).join('')}
          </div>
        </div>
      `;
    }

    let timelineHtml = '';
    if (r.timeline && r.timeline.length > 0) {
      timelineHtml = `
        <div style="margin-top: 1.25rem;">
          <h4 style="margin: 0 0 0.65rem; font-size: 0.95rem; color: var(--navy);">Response Progress</h4>
          <div class="timeline">
            ${r.timeline.map(s => `
              <div class="step ${s.done ? 'done' : ''}">
                <span class="dot"></span>
                <div>
                  <div style="display: flex; justify-content: space-between; align-items: baseline; gap: 0.5rem;">
                    <strong style="font-size: 0.85rem; color: var(--navy);">${escapeHtml(s.title)}</strong>
                    <span class="step-time">${escapeHtml(s.time || '')}</span>
                  </div>
                  <p>${escapeHtml(s.desc || '')}</p>
                </div>
              </div>
            `).join('')}
          </div>
        </div>
      `;
    }

    const urgencyColor = r.urgency === 'High' ? 'urg-high' : (r.urgency === 'Medium' ? 'urg-med' : 'urg-low');
    const statusColor = r.status === 'Completed' ? 'done' : (r.status === 'Ongoing' ? 'pending' : 'info');

    document.getElementById('modalReqBody').innerHTML = `
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; flex-wrap: wrap; gap: 0.5rem;">
        <span class="badge ${urgencyColor}">${escapeHtml(r.urgency)} Urgency</span>
        <span class="badge ${statusColor}">${escapeHtml(r.status)}</span>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.85rem; background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: 12px; padding: 1rem; font-size: 0.85rem;">
        <div>
          <span class="muted small" style="display: block;">Requester</span>
          <strong>${escapeHtml(r.student_name || 'N/A')}</strong>
        </div>
        <div>
          <span class="muted small" style="display: block;">Contact Phone</span>
          <a href="tel:${(r.student_phone || '').replace(/[^0-9]/g, '')}" style="color: var(--teal); font-weight: 700;">
            📞 ${escapeHtml(r.student_phone || 'N/A')}
          </a>
        </div>
        <div>
          <span class="muted small" style="display: block;">Location</span>
          <strong>📍 ${escapeHtml(r.location)}</strong>
        </div>
        <div>
          <span class="muted small" style="display: block;">Reported At</span>
          <strong>${escapeHtml(r.created)}</strong>
        </div>
        <div style="grid-column: 1 / -1;">
          <span class="muted small" style="display: block;">Assigned Medical Responder</span>
          <strong>${escapeHtml(r.assigned_to || 'Awaiting Responder Assignment')}</strong>
          ${r.eta ? `<span class="badge info" style="margin-left: 0.5rem;">ETA: ${escapeHtml(r.eta)}</span>` : ''}
        </div>
      </div>

      <div style="margin-top: 1rem;">
        <span class="muted small" style="display: block; font-weight: 600;">Concern & Description</span>
        <div style="background: white; border: 1px solid var(--gray-200); border-radius: 8px; padding: 0.75rem; margin-top: 0.35rem; font-size: 0.88rem; line-height: 1.5;">
          ${escapeHtml(r.details || r.issue)}
        </div>
      </div>

      ${timelineHtml}
      ${notesHtml}
    `;

    document.getElementById('modalReqFooter').innerHTML = `
      <button class="btn btn-outline" onclick="closeModal('requestDetailModal')">Close</button>
      <button class="btn btn-outline btn-sm" onclick="openNoteModal('${escapeHtml(r.id)}')">📝 Add Note</button>
      ${r.status !== 'Completed' && r.status !== 'Cancelled' ? `
        <button class="btn btn-outline-danger btn-sm" onclick="closeModal('requestDetailModal'); openCancelModal('${escapeHtml(r.id)}')">✕ Cancel</button>
      ` : ''}
    `;

    openModal('requestDetailModal');
  }

  // Copy to clipboard helper
  function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
      alert(`Copied "${text}" to clipboard!`);
    }).catch(() => {
      prompt("Copy hotline number:", text);
    });
  }

  // Form helpers
  function selectUrgency(level) {
    document.querySelectorAll('.urg-option').forEach(el => {
      el.classList.remove('selected-low', 'selected-med', 'selected-high');
    });
    const opt = document.getElementById(`opt-${level.toLowerCase()}`);
    if (opt) {
      opt.classList.add(`selected-${level.toLowerCase()}`);
      const radio = opt.querySelector('input[type="radio"]');
      if (radio) radio.checked = true;
    }
  }

  function setLocation(loc) {
    const el = document.getElementById('location');
    if (el) el.value = loc;
  }

  function quickSelectConcern(issue, urgency, symptoms) {
    const issueEl = document.getElementById('issue');
    const symptomsEl = document.getElementById('symptoms');
    if (issueEl) issueEl.value = issue;
    if (symptomsEl) symptomsEl.value = symptoms;
    selectUrgency(urgency);
  }

  function updateUrgencyRecommendation(issue) {
    if (issue === 'Breathing concern' || issue === 'Allergic reaction') {
      selectUrgency('High');
    } else if (issue === 'Injury' || issue === 'Pain') {
      selectUrgency('Medium');
    }
  }

  function detectLocation() {
    const locInput = document.getElementById('location');
    if (!locInput) return;

    if (navigator.geolocation) {
      locInput.value = 'Locating campus coordinates...';
      navigator.geolocation.getCurrentPosition(
        pos => {
          locInput.value = `Campus Geolocation • [${pos.coords.latitude.toFixed(4)}, ${pos.coords.longitude.toFixed(4)}]`;
        },
        err => {
          locInput.value = 'Main Campus • Student Pavilion (GPS unavailable)';
        },
        { timeout: 5000 }
      );
    } else {
      locInput.value = 'Main Campus • Student Pavilion';
    }
  }

  function fillSampleForm(type) {
    if (type === 'asthma') {
      document.getElementById('student_name').value = 'Jordan Miller';
      document.getElementById('student_phone').value = '(555) 723-9941';
      document.getElementById('issue').value = 'Breathing concern';
      document.getElementById('location').value = 'Science Complex • 3rd Floor Lab 302';
      document.getElementById('symptoms').value = 'Experiencing sudden shortness of breath and wheezing after chemical lab. Inhaler is in dormitory.';
      document.getElementById('details').value = 'Lab instructor is present. Please bring emergency nebulizer.';
      selectUrgency('High');
    } else if (type === 'injury') {
      document.getElementById('student_name').value = 'Casey Brooks';
      document.getElementById('student_phone').value = '(555) 431-8890';
      document.getElementById('issue').value = 'Injury';
      document.getElementById('location').value = 'Campus Recreation • Gymnasium Court B';
      document.getElementById('symptoms').value = 'Severe ankle sprain from landing awkwardly. Ankle is rapidly swelling and unable to bear any weight.';
      document.getElementById('details').value = 'Sitting on bench by court entrance. Need cold compress and wheelchair.';
      selectUrgency('Medium');
    }
  }

  // History filtering
  function filterHistory(filter) {
    window.location.href = `?view=history&filter=${filter}`;
  }

  function searchHistoryList(query) {
    const q = query.toLowerCase().trim();
    const items = document.querySelectorAll('#historyRequestList .request');
    let visibleCount = 0;

    items.forEach(item => {
      const searchData = item.getAttribute('data-search') || '';
      if (!q || searchData.includes(q)) {
        item.style.display = 'flex';
        visibleCount++;
      } else {
        item.style.display = 'none';
      }
    });
  }

  // Admin table filtering
  function searchAdminTable(query) {
    const q = query.toLowerCase().trim();
    const rows = document.querySelectorAll('#adminRequestsTable tbody tr');
    rows.forEach(row => {
      const searchData = row.getAttribute('data-search') || '';
      row.style.display = (!q || searchData.includes(q)) ? '' : 'none';
    });
  }

  function filterAdminTableSelect(status) {
    const rows = document.querySelectorAll('#adminRequestsTable tbody tr');
    rows.forEach(row => {
      const rowStatus = row.getAttribute('data-status');
      row.style.display = (status === 'all' || rowStatus === status) ? '' : 'none';
    });
  }

  function filterAdminTableUrgency(urgency) {
    const rows = document.querySelectorAll('#adminRequestsTable tbody tr');
    rows.forEach(row => {
      const rowUrgency = row.getAttribute('data-urgency');
      row.style.display = (urgency === 'all' || rowUrgency === urgency) ? '' : 'none';
    });
  }

  function filterTableByStatus(status) {
    const select = document.getElementById('adminStatusFilter');
    if (select) {
      if (status === 'active') {
        // filter active rows
        const rows = document.querySelectorAll('#adminRequestsTable tbody tr');
        rows.forEach(row => {
          const rowStatus = row.getAttribute('data-status');
          row.style.display = (rowStatus !== 'Completed' && rowStatus !== 'Cancelled') ? '' : 'none';
        });
        select.value = 'all';
        return;
      }
      select.value = status;
      filterAdminTableSelect(status);
    }
  }

  function filterTableByUrgency(urgency) {
    const select = document.getElementById('adminUrgencyFilter');
    if (select) {
      select.value = urgency;
      filterAdminTableUrgency(urgency);
    }
  }

  function escapeHtml(text) {
    if (!text) return '';
    return text.toString()
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
  }
</script>

</body>
</html>
