<?php

// Database connection details
$host = "localhost"; // Change to your database host
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "staffmanagement"; // Your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to join staff and appraisal tables and get ID, Name, and total appraisals
$sql = "
SELECT ID as StaffID, Name
FROM staff s
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <base href="../">
    <title>Unlocking Potential: Employee Appraisal System</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/upot.png" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-duotone-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-duotone-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-duotone-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-duotone-light.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-light.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/duotone-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/duotone-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/duotone-light.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>


    <script src="script.js"></script>
    <!--end::Global Stylesheets Bundle-->
    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
    <style>
        #faculties {
            text-align: center;
        }
    </style>

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>var defaultThemeMode = "light"; var themeMode; if (document.documentElement) { if (document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if (localStorage.getItem("data-bs-theme") !== null) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header" data-kt-sticky="true"
                data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize"
                data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
                    id="kt_app_header_container">
                    <!--begin::Sidebar mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
                            id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <!--end::Sidebar mobile toggle-->
                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="#" class="d-lg-none">
                            <img alt="Logo" src="https://asiatech-hs.alcarom.com/images/logo/logo_1.png"
                                class="h-30px" />
                        </a>
                    </div>
                    <!--end::Mobile logo-->
                    <!--begin::Header wrapper-->
                    <?php include "part/nav.php" ?>
                    <!--end::Header wrapper-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <?php include "part/sidebar.php" ?>
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Content container-->
                        <div style="border-radius: 30px; padding-top: 20px; padding-bottom: 20px; scroll-padding-left: 20px; scroll-padding-right: 20px; padding-right: -110px padding-left: -100px;"
                            class="card">
                            <div>
                                <h1 style="padding-left: 90px">APPRAISAL</h1>
                                <h6 style="padding-left: 90px">Evaluating the team members based on their performance
                                    and achievements.</h6>
                                <!-- <button class="button button1">Green</button> -->
                            </div>
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table id="faculties" style="width: 100%;"
                                            class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                            <thead>
                                                <tr class="fw-bold fs-6 text-gray-800">
                                                    <th style="padding-left: 30px;">ID</th>
                                                    <th>Name</th>
                                                    <th>Total Rate</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    // Output data for each row
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<tr class=" fs-6 text-gray-800">';
                                                        echo "<td>" . $row['StaffID'] . "</td>";
                                                        echo "<td>" . $row['Name'] . "</td>";
                                                        // echo "<td>" . $row['Total'] . "</td>";
                                                        echo '<td>
																<div class="">									
																	<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit-btn" data-bs-toggle="modal" data-bs-target="#kt_modal_edit" data-id="' . $row['StaffID'] . '" data-name="' . $row['Name'] . '">
																		<i class="ki-duotone ki-pencil fs-2">
																			<span class="path1"></span>
																			<span class="path2"></span>
																		</i>
																	</a>
																</div>
															</td>';
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='7'>No data found</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->

                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    <div id="kt_app_footer" class="app-footer">
                        <!--begin::Footer container-->
                        <?php include "part/footer.php" ?>
                        <!--end::Footer container-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::App-->
        <!--begin::Modal - Appraisal Checlist-->
        <div class="modal fade" id="kt_modal_edit" tabindex="-1">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_edit_header">
                        <!--begin::Modal title-->
                        <h2>Appraisal Catalog</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <table id="documentsTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Document Name</th>
                                <th>Category</th>
                                <th>Custom Points</th>
                                <th>Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be populated here -->
                        </tbody>
                    </table>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
    </div>
    <!--end::Modal - Appraisal Checlist-->
    <!--begin::Javascript-->
    <script>var hostUrl = "assets/";</script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="assets/js/custom/utilities/modals/new-target.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>

<script>
    let appraisalPointsMap = {};

    window.onload = function () {
        fetch('admin/data/appraisalPoints.json')
            .then(response => response.json())
            .then(data => {
                appraisalPointsMap = data;
                console.log('Appraisal points:', appraisalPointsMap);
            });

        // Update the form values when the modal is shown
        $('#kt_modal_edit').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget); // Button that triggered the modal
            const id = button.data('id'); // Extract info from data-* attributes
            console.log("Loading record ID: " + id);
            // Fetch the documents data where approved value is 1
            fetch(`admin/appraisal/getAppraisalRecord.php?id=${id}`)
                .then(response => response.json())
                .then(documents => {
                    const tableBody = document.querySelector('#documentsTable tbody');
                    tableBody.innerHTML = ''; // Clear existing data
                    let totalPoints = 0;
                    documents.forEach(doc => {
                        const customPoints = doc.Custom_Points == 1 ? 'Yes' : 'No';
                        totalPoints += parseInt(doc.Points);
                        const row = document.createElement('tr');
                        $file = doc.Document_Name;
                        row.innerHTML = `
                        <td>${doc.Document_Name}</td>                      
                        <td>${doc.Category}</td>
                        <td>${customPoints}</td>
                        <td>${doc.Points}</td>
                    `;
                        tableBody.appendChild(row);
                    });
                    // Add a label showing total points
                    const totalPointsLabel = document.createElement('div');
                    totalPointsLabel.innerHTML = `<strong>Total Points: ${totalPoints}</strong>`;
                    tableBody.appendChild(totalPointsLabel);
                });
        });
    };
</script>