<?php

    require_once 'core/db_abstract.php';

    class eventsModel extends dbAbstractModel {

        public function get () {

            $this->query = 'SELECT e.id_event, e.title_event, e.organizer_event, e.info_event, e.date_realized_event, e.date_created_event, e.place_event, e.type_event, e.participants_event, e.state_event, a.asunto FROM events e INNER JOIN asunto_event a ON e.asunto = a.id_a';

            $this->get_result_from_query();
            return $this->rows;
        }

        public function getById () {

            $this->query = 'SELECT e.id_event, e.title_event, e.organizer_event, e.info_event, e.date_realized_event, e.place_event, e.type_event, e.participants_event, e.state_event, a.asunto FROM events e INNER JOIN asunto_event a ON e.asunto = a.id_a WHERE e.id_event='. $_GET['id'];

            $this->get_result_from_query();
            return $this->rows;
        }

        public function post () {

            if ($_POST) {
                
                 if (!empty($_POST['title_event']) && !empty($_POST['organizer_event']) && !empty($_POST['info_event']) && !empty($_POST['date_realized_event']) && !empty($_POST['date_created_event']) && !empty($_POST['place_event'])  && !empty($_POST['type_event'])  && !empty($_POST['participants_event']) && !empty($_POST['state_event']) && !empty($_POST['asunto'])) {
                     
                    $this->query = 'INSERT INTO `events` (title_event, organizer_event, info_event, date_realized_event, date_created_event, place_event, type_event, participants_event, state_event, asunto) VALUES (?,?,?,?,?,?,?,?,?,?)';
                    
                    $title_event = $_POST['title_event'];
                    $organizer_event = $_POST['organizer_event'];
                    $info_event = $_POST['info_event'];
                    $date_realized_event = $_POST['date_realized_event'];
                    $date_created_event = $_POST['date_created_event'];
                    $place_event = $_POST['place_event'];
                    $type_event = $_POST['type_event'];
                    $participants_event = $_POST['participants_event'];
                    $state_event = $_POST['state_event'];
                    $asunto = $_POST['asunto'];
                
                    $this->rows = array(&$title_event, &$organizer_event, &$info_event, &$date_realized_event, &$date_created_event, &$place_event, &$type_event, &$participants_event, &$state_event, &$asunto);
                    
                     return $this->execute_single_query('sssssssisi', $this->rows);
                  
                }
            }

        }

        public function postPartipant ($user) {

            if ($_GET) {
                
                 if (!empty($_GET['id'])) {
                     
                    $this->query = 'INSERT INTO `event_participant` (id_user, id_event, state) VALUES (?,?,?)';
                    $id = $_GET['id'];
                    $this->rows = array(&$user, &$id, 1);
                    
                     return $this->execute_single_query('iii', $this->rows);
                  
                }
            }

        }

        public function postInteresado ($user) {

            if ($_GET) {
                
                 if (!empty($_GET['id'])) {
                     
                    $this->query = 'INSERT INTO `event_participant` (id_user, id_event, state) VALUES (?,?,?)';
                    $id = $_GET['id'];
                
                    $this->rows = array(&$user, &$id, 0);
                    
                     return $this->execute_single_query('iii', $this->rows);
                  
                }
            }

        }

        public function getParticipantsEvent ($id) {

            $this->query = "SELECT * FROM event_participant p INNER JOIN events e ON e.id_event = p.id_event WHERE p.id_user = ".$id;
            
            $this->get_result_from_query();
            return $this->rows;
        }
        
        public function getByIdPartipant ($id) {

            $this->query = "SELECT * FROM `event_participant` WHERE id_user=" . $id;
            $this->get_result_from_query();
            return $this->rows;
        }

        public function getParticipantsByEvent ($event) {

            $this->query = "SELECT e.id_event, e.title_event, e.organizer_event, e.info_event, e.date_realized_event, e.place_event, e.type_event, e.participants_event, e.state_event, b.ID, b.id_user, b.id_event, b.state, a.asunto, u.id_user, u.name_user, u.tlf_user, u.correo_user FROM events e INNER JOIN event_participant b INNER JOIN asunto_event a INNER JOIN usuario u ON e.id_event = b.id_event AND e.asunto = a.id_a AND u.id_user = b.id_user WHERE e.id_event = " . $event;
            
            $this->get_result_from_query();
            return $this->rows;
        }

        public function getParticipants() {

            $this->query = "SELECT e.id_event, e.title_event, e.organizer_event, e.info_event, e.date_realized_event, e.place_event, e.type_event, e.participants_event, e.state_event, b.ID, b.id_user, b.id_event, b.state, a.asunto, u.id_user, u.name_user, u.tlf_user, u.correo_user FROM events e INNER JOIN event_participant b INNER JOIN asunto_event a INNER JOIN usuario u ON e.id_event = b.id_event AND e.asunto = a.id_a AND u.id_user = b.id_user WHERE e.id_event = ". $_GET['id'];
            
            $this->get_result_from_query();
            return $this->rows;
        }

        public function update () {

            if ($_POST) {

                if (!empty($_POST['title_event']) && !empty($_POST['organizer_event']) && !empty($_POST['info_event']) && !empty($_POST['date_realized_event']) && !empty($_POST['place_event'])  && !empty($_POST['type_event'])  && !empty($_POST['participants_event'])  && !empty($_POST['state_event'])  && !empty($_POST['asunto']) && $_POST['id']) {

                    $this->query = 'UPDATE `events` SET title_event=?, organizer_event=?, info_event=?, date_realized_event=?, place_event=?, type_event=?, participants_event=?, state_event=?, asunto=? WHERE id_event=?';

                    $title_event = $_POST['title_event'];
                    $organizer_event = $_POST['organizer_event'];
                    $info_event = $_POST['info_event'];
                    $date_realized_event = $_POST['date_realized_event'];
                    $date_created_event = $_POST['date_created_event'];
                    $place_event = $_POST['place_event'];
                    $type_event = $_POST['type_event'];
                    $participants_event = $_POST['participants_event'];
                    $state_event = $_POST['state_event'];
                    $asunto = $_POST['asunto'];
                    $id = $_POST['id'];
                
                    $this->rows = array(&$title_event, &$organizer_event, &$info_event, &$date_realized_event, &$date_created_event, &$place_event, &$type_event, &$participants_event, &$state_event, &$asunto, &$id);

                     $this->execute_single_query('ssssssisii', $this->rows);
                       
                }
            }
        }

        public function delete () {

            if ($_GET) {

                $this->query = "DELETE FROM events WHERE id_event='" . $_GET['id']."'";
                $id = $_GET['id'];
                $this->rows = array(&$id);
                $this->execute_single_query('i', $this->rows);
            }
        }

        public function cancelar () {

            if ($_GET) {

                $this->query = "DELETE FROM `event_participant` WHERE ID='" . $_GET['id']."'";
                $id = $_GET['id'];
                $this->rows = array(&$id);
                $this->execute_single_query('i', $this->rows);
            }
        }
        public function historial() {}
        public function inhabilitar() {}
    }