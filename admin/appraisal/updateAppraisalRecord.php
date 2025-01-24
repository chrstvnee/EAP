<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "staffmanagement";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$staff_id = $_POST['ID'] ?? 0;
$total = $_POST['Total'] ?? 0;
$doctorate_degree = $_POST['Doctorate_Degree'] ?? 0;
$masters_degree = $_POST['Masters_Degree'] ?? 0;
$bachelors_degree = $_POST['Bachelors_Degree'] ?? 0;
$special_course = $_POST['Special_Course'] ?? 0;
$license_examination = $_POST['License_Examination'] ?? 0;
$additional_units = $_POST['Additional_Units'] ?? 0;
$service_years_other_school = $_POST['Service_Years_Other_School'] ?? 0;
$service_years_asiatech = $_POST['Service_Years_Asiatech'] ?? 0;
$service_years_industry = $_POST['Service_Years_Industry'] ?? 0;
$service_years_role_a = $_POST['Service_Years_Role_A'] ?? 0;
$service_years_role_b = $_POST['Service_Years_Role_B'] ?? 0;
$service_years_role_c = $_POST['Service_Years_Role_C'] ?? 0;
$works_original_author = $_POST['Works_Original_Author'] ?? 0;
$works_co_author = $_POST['Works_Co_Author'] ?? 0;
$works_reviewer = $_POST['Works_Reviewer'] ?? 0;
$works_editor = $_POST['Works_Editor'] ?? 0;
$works_compiler = $_POST['Works_Compiler'] ?? 0;
$works_encoder = $_POST['Works_Encoder'] ?? 0;
$works_programmer = $_POST['Works_Programmer'] ?? 0;
$paper_publish_count_international = $_POST['Paper_Publish_Count_International'] ?? 0;
$paper_publish_count_national = $_POST['Paper_Publish_Count_National'] ?? 0;
$paper_publish_count_local = $_POST['Paper_Publish_Count_Local'] ?? 0;
$training_course_years_international = $_POST['Training_Course_Years_International'] ?? 0;
$training_course_years_national = $_POST['Training_Course_Years_National'] ?? 0;
$training_course_years_local = $_POST['Training_Course_Years_Local'] ?? 0;
$resource_person_international = $_POST['Resource_Person_International'] ?? 0;
$resource_person_national = $_POST['Resource_Person_National'] ?? 0;
$resource_person_local = $_POST['Resource_Person_Local'] ?? 0;
$seminar_international = $_POST['Seminar_International'] ?? 0;
$seminar_national = $_POST['Seminar_National'] ?? 0;
$seminar_local = $_POST['Seminar_Local'] ?? 0;
$membership_learned_society = $_POST['Membership_Learned_Society'] ?? 0;
$membership_professional_organization = $_POST['Membership_Professional_Organization'] ?? 0;
$membership_civic_social_economic_organization = $_POST['Membership_Civic_Social_Economic_Organization'] ?? 0;
$Honors_Summa_Laude = $_POST['Honors_Summa_Laude'] ?? 0;
$Honors_Laude = $_POST['Honors_Laude'] ?? 0;
$honors_honorable_mention = $_POST['Honors_Honorable_Mention'] ?? 0;
$civic_service_first_level = $_POST['Civic_Service_First_level'] ?? 0;
$civic_service_second_level = $_POST['Civic_Service_Second_level'] ?? 0;
$civic_service_third_level = $_POST['Civic_Service_Third_level'] ?? 0;
$performance_rating = $_POST['Performance_Rating'] ?? 0;

echo "Total: $total";
echo "staff_id: $staff_id";

// Prepare and bind
$stmt = $conn->prepare("UPDATE Appraisal SET 
    Total = ?, 
    Doctorate_Degree = ?, 
    Masters_Degree = ?, 
    Bachelors_Degree = ?, 
    Special_Course = ?, 
    License_Examination = ?, 
    Additional_Units = ?, 
    Service_Years_Other_School = ?, 
    Service_Years_Asiatech = ?, 
    Service_Years_Industry = ?, 
    Service_Years_Role_A = ?, 
    Service_Years_Role_B = ?, 
    Service_Years_Role_C = ?, 
    Works_Original_Author = ?, 
    Works_Co_Author = ?, 
    Works_Reviewer = ?, 
    Works_Editor = ?, 
    Works_Compiler = ?, 
    Works_Encoder = ?, 
    Works_Programmer = ?, 
    Paper_Publish_Count_International = ?, 
    Paper_Publish_Count_National = ?, 
    Paper_Publish_Count_Local = ?, 
    Training_Course_Years_International = ?, 
    Training_Course_Years_National = ?, 
    Training_Course_Years_Local = ?, 
    Resource_Person_International = ?, 
    Resource_Person_National = ?, 
    Resource_Person_Local = ?, 
    Seminar_International = ?, 
    Seminar_National = ?, 
    Seminar_Local = ?, 
    Membership_Learned_Society = ?, 
    Membership_Professional_Organization = ?, 
    Membership_Civic_Social_Economic_Organization = ?, 
    Honors_Summa_Laude = ?, 
    Honors_Laude = ?, 
    Honors_Honorable_Mention = ?, 
    Civic_Service_First_level = ?, 
    Civic_Service_Second_level = ?, 
    Civic_Service_Third_level = ?, 
    Performance_Rating = ? 
    WHERE Staff_ID = ?");

$stmt->bind_param(
    'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii',
    $total,
    $doctorate_degree,
    $masters_degree,
    $bachelors_degree,
    $special_course,
    $license_examination,
    $additional_units,
    $service_years_other_school,
    $service_years_asiatech,
    $service_years_industry,
    $service_years_role_a,
    $service_years_role_b,
    $service_years_role_c,
    $works_original_author,
    $works_co_author,
    $works_reviewer,
    $works_editor,
    $works_compiler,
    $works_encoder,
    $works_programmer,
    $paper_publish_count_international,
    $paper_publish_count_national,
    $paper_publish_count_local,
    $training_course_years_international,
    $training_course_years_national,
    $training_course_years_local,
    $resource_person_international,
    $resource_person_national,
    $resource_person_local,
    $seminar_international,
    $seminar_national,
    $seminar_local,
    $membership_learned_society,
    $membership_professional_organization,
    $membership_civic_social_economic_organization,
    $Honors_Summa_Laude,
    $Honors_Laude,
    $honors_honorable_mention,
    $civic_service_first_level,
    $civic_service_second_level,
    $civic_service_third_level,
    $performance_rating,
    $staff_id
);
// Execute the statement
if ($stmt->execute()) {
    echo "Record updated successfully";

    // Close connection
    $stmt->close();
    $conn->close();

    // Redirect back to the main page
    header("Location: http://localhost/EAP/admin/appraisal.php");
    exit();
} else {
    echo "Error updating record: " . $stmt->error;
}

?>