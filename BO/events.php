<?php

require("connection.php");

class events
{
    private $id;
    private $name;
    private $date;
    private $description;
    private $image;

    // Setters
    public function setid($id)
    {
        $this->id = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }

    // Getters
    public function getEventId() 
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getImage()
    {
        return $this->image;
    }

    // Add event
    public function add()
    {
        try {
            $conn = connection::getConnection();
            $query = "INSERT INTO `events`(`name`, `date`, `Description`, `Image`) VALUES (?,?,?,?)";
            $st = $conn->prepare($query);
            $st->bindParam(1, $this->name, PDO::PARAM_STR);
            $st->bindParam(2, $this->date, PDO::PARAM_STR);
            $st->bindParam(3, $this->description, PDO::PARAM_STR);
            $st->bindParam(4, $this->image, PDO::PARAM_STR);
            if ($st->execute()) {
                return $conn->lastInsertId();
            } else {
                return -1;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    // Update event
    public function update()
    {
        try {
            $conn = connection::getConnection();
            $query = "UPDATE `events` SET `name`=?, `date`=?, `Description`=? WHERE id=?";
            $st = $conn->prepare($query);
            $st->bindParam(1, $this->name, PDO::PARAM_STR);
            $st->bindParam(2, $this->date, PDO::PARAM_STR);
            $st->bindParam(3, $this->description, PDO::PARAM_STR);
            $st->bindParam(4, $this->id, PDO::PARAM_INT);
            return $st->execute();
        } catch (Exception $e) {
            throw $e;
        }
    }

    // Delete event
    public function del()
    {
        try {
            $conn = connection::getConnection();
            $query = "DELETE FROM `events` WHERE id=?";
            $st = $conn->prepare($query);
            $st->bindParam(1, $this->id, PDO::PARAM_INT);
            return $st->execute();
        } catch (Exception $e) {
            throw $e;
        }
    }

    // Get all events
    public function get()
    {
        try {
            $conn = connection::getConnection();
            $query = "SELECT id, name, date, Description, Image FROM events";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $Events = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$Events) {
                return [];
            }

            $events = array();
            foreach ($Events as $item) {
                $event = new events();
                $event->setid($item['id']);
                $event->setName($item['name']);
                $event->setDate($item['date']);
                $event->setDescription($item['Description']);
                $event->setImage($item['Image']);
                array_push($events, $event);
            }
            return $events;

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    // Get event by ID
    public function getid($id)
    {
        try {
            $conn = connection::getConnection();
            $query = "SELECT id, name, date, Description, Image FROM events WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $eventData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($eventData) {
                $event = new events();
                $event->setid($eventData['id']);
                $event->setName($eventData['name']);
                $event->setDate($eventData['date']);
                $event->setDescription($eventData['Description']);
                $event->setImage($eventData['Image']);
                return $event;
            } else {
                return null;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    // Update event image
    public function updateImage()
    {
        try {
            $conn = connection::getConnection();
            $query = "UPDATE events SET Image=? WHERE id=?";
            $st = $conn->prepare($query);
            $st->bindParam(1, $this->image, PDO::PARAM_STR);
            $st->bindParam(2, $this->id, PDO::PARAM_INT);
            $st->execute();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
