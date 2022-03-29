<?php


class meal_db
{

    private mysqli $link;

    public function __construct()
    {
        $this->link = mysqli_connect('localhost', 'root', '', "meals");

    }


    public function getAllMeals(): ?array
    {
        $sql = "select *
              from meal
             ";
        $result = mysqli_query($this->link, $sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }


    public function getMealById($id): ?array
    {
        $sql = "select *
                from meal
                where id=$id
                ";
        $result = mysqli_query($this->link,$sql);
        return mysqli_fetch_array($result,MYSQLI_ASSOC);
    }


    public function getMealReviewBy($id): ?array
    {
        $sql = "SELECT *
                FROM reviews 
                WHERE meal_id = $id
                ";
        $result = mysqli_query($this->link,$sql);
        return mysqli_fetch_array($result,MYSQLI_ASSOC);
    }

    public function getAverageRating($id): ?array
    {
        $sql = "SELECT AVG(rating) as rating 
                FROM reviews 
                WHERE meal_id = $id
                ";
        $result = mysqli_query($this->link,$sql);
        return mysqli_fetch_array($result,MYSQLI_ASSOC);
    }



    public function addMealReviews($data): bool
    {

        if ($this->upload_Rev_file($data["image"])) {
            $reviewer_name = mysqli_real_escape_string($this->link, $data["reviewer_name"]);
            $city = mysqli_real_escape_string($this->link, $data["city"]);
            $rating= $data["rating"];
            $image = $data["image"]["name"];
            $review = mysqli_real_escape_string($this->link, $data["review"]);
            $id = $data["id"];
            $date = date("Y/m/d H:i:s");
            $sql = "insert into reviews(reviewer_name,city,date,rating,image,review,meal_id)
                  values ('$reviewer_name','$city','$date' ,'$rating','$image','$review','$id')  ";
        }
        if (mysqli_query($this->link, $sql)) {
            return true;

        } else {
            echo "error executing $sql " . mysqli_error($this->link);
            return false;
        }
    }





    public function addMeal($data): bool
    {
        if ($this->upload_file($data["image"])) {
            $name = mysqli_real_escape_string($this->link, $data["title"]);
            $price = $data["price"];
            $image = $data["image"]["name"];
            $description = mysqli_real_escape_string($this->link, $data["description"]);
            $sql = "insert into meal(title,price,image,description)
                  values ('$name','$price','$image','$description')  ";
        }
        if (mysqli_query($this->link, $sql)) {
            return true;

        } else {
            echo "error executing $sql " . mysqli_error($this->link);
            return false;
        }
    }

    private function upload_file($file): bool
    {
        $target_file = "images/" . basename($file["name"]);
        return move_uploaded_file($file["tmp_name"], $target_file);
    }

    private function upload_Rev_file($file): bool
    {
        $target_file = "reviewImages/" . basename($file["name"]);
        return move_uploaded_file($file["tmp_name"], $target_file);
    }

}

