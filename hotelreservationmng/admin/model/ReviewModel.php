<?php
include "db.php";
class ReviewModel {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function getAllReviews() {
        $sql = "SELECT * FROM guest_reviews ORDER BY created_at DESC";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function addReview($guest_name, $rating, $comment) {
        $sql = "INSERT INTO guest_reviews (guest_name, rating, comment, status) 
                VALUES ('$guest_name', $rating, '$comment', 'pending')";
        return mysqli_query($this->conn, $sql);
    }
    public function updateStatus($id, $status) {
        $sql = "UPDATE guest_reviews SET status='$status' WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }
    public function addResponse($id, $response) {
        $sql = "UPDATE guest_reviews SET response='$response' WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }
    public function deleteReview($id) {
        $sql = "DELETE FROM guest_reviews WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }
}
?>
