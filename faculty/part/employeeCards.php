<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "staffmanagement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read email from text file
$root_path = $_SERVER['DOCUMENT_ROOT'];
$emailFile = $root_path . '/EAP/admin/authentication/data/session.txt';
$email = trim(file_get_contents($emailFile));

$sql = "SELECT Staff.Name, Appraisal.Total FROM Staff JOIN Appraisal ON Staff.ID = Appraisal.Staff_ID WHERE Staff.Email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $name = $row["Name"];
        $ratings = $row["Total"];
    }
}
$stmt->close();
$conn->close();
?>

<!--begin::Row-->
<div class="row g-5 gx-xl-10 mb-2 mb-xl-10">
    <!--begin::Col-->
    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-12 mb-xl-12">
        <!--begin::Total Employee-->
        <div class="card card-flush pt-5 pb-5">
            <!--begin::Card body-->
            <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                <!--begin::Col 1-->
                <div class="col-md-4 text-center">
                    <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2"
                        id="name"><?php echo htmlspecialchars($name); ?></span>
                </div>
                <!--end::Col 1-->
                <!--begin::Col 2-->
                <div class="col-md-4 text-center">
                    <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2"
                        id="ratings"><?php echo htmlspecialchars($ratings); ?></span>
                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Ratings</span>
                </div>
                <!--end::Col 2-->
                <!--begin::Col 3-->
                <div class="col-md-4 text-center">
                    <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">50</span>
                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Units</span>
                </div>
                <!--end::Col 3-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Total Employee-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->