<?php

    require_once 'core/db_abstract.php';

    class libroModel extends dbAbstractModel {

        public function get () {
            $this->query = 'SELECT l.id_libro AS id, l.cota AS cota, l.titulo AS titulo, l.autor AS autor,  c.id_c AS categoria, l.estado_libro AS estado, l.sinopsis AS sinopsis, l.cantidad AS cantidad, c.nombre_c AS nombrec, i.cant_inv AS stock, i.total_inv AS total, i.min_inv AS min, i.resto_inv AS resto FROM libros l INNER JOIN categoria c INNER JOIN inventario i ON l.categoria = c.id_c AND l.cantidad = i.id_inv';
            $this->get_result_from_query();
            return $this->rows;
        }

        public function getById () {
            $this->query = "SELECT l.id_libro AS id, l.cota AS cota, l.titulo AS titulo, l.autor AS autor,  c.id_c AS categoria, l.estado_libro AS estado, l.sinopsis AS sinopsis, l.cantidad AS cantidad, c.nombre_c AS nombrec, i.cant_inv AS stock, i.total_inv AS total, i.min_inv AS min, i.resto_inv AS resto FROM libros l INNER JOIN categoria c INNER JOIN inventario i ON l.categoria = c.id_c AND l.cantidad = i.id_inv WHERE id_libro='" . $_GET['id']."'";
            $this->get_result_from_query();
            return $this->rows;
        }

        public function getCantidadStock () {
            $this->query = 'SELECT l.cota AS cota, l.titulo AS titulo, c.id_c AS categoria, l.estado_libro AS estado, l.cantidad AS cantidad, c.nombre_c AS nombrec, i.cant_inv AS stock, i.total_inv AS total, i.min_inv AS min, i.resto_inv AS resto FROM libros l INNER JOIN categoria c INNER JOIN inventario i ON l.categoria = c.id_c AND l.cantidad = i.id_inv';
            $this->get_result_from_query();
            return $this->rows;
        }

        public function getCantidadStockById ($id) {
            $this->query = 'SELECT l.cota AS cota, l.titulo AS titulo, c.id_c AS categoria, l.estado_libro AS estado, l.cantidad AS cantidad, c.nombre_c AS nombrec, i.cant_inv AS stock, i.total_inv AS total, i.min_inv AS min, i.resto_inv AS resto FROM libros l INNER JOIN categoria c INNER JOIN inventario i ON l.categoria = c.id_c AND l.cantidad = i.id_inv WHERE id_libro=' . "'" . $id . "'";
            $this->get_result_from_query();
            return $this->rows;
        }

        public function post () {
            if ($_POST) {
                 if (!empty($_POST['cota']) && !empty($_POST['titulo']) && !empty($_POST['autor']) && !empty($_POST['categoria']) && !empty($_POST['estado'])) {
                    $sinopsis = empty(trim($_POST['sinopsis'])) ? 'No contiene sinopsis' : $_POST['sinopsis'];
                    $cota = $_POST['cota']; 
                    $titulo = $_POST['titulo'];
                    $autor = $_POST['autor']; 
                    $categoria = $_POST['categoria'];
                    $estado = $_POST['estado'];

                    $this->query = 'INSERT INTO `libros` (cota, titulo, autor, categoria, estado_libro, sinopsis) VALUES (?,?,?,?,?,?)';
                
                    $this->rows = array(&$cota, &$titulo, &$autor, &$categoria, &$estado, &$sinopsis);
                    
                    return $this->execute_single_query('sssiss', $this->rows);
                }
            }
        }

        public function update () {
            if ($_POST) {
                if (!empty($_POST['titulo']) && !empty($_POST['autor']) && !empty($_POST['categoria']) && !empty($_POST['estado']) && !empty($_POST['cota']) && $_POST['sinopsis'] && $_POST['id']) {
                    $sinopsis = empty(trim($_POST['sinopsis'])) ? 'No contiene sinopsis' : $_POST['sinopsis'];
                    $cota = $_POST['cota']; 
                    $titulo = $_POST['titulo'];
                    $autor = $_POST['autor']; 
                    $categoria = $_POST['categoria'];
                    $estado = $_POST['estado'];
                    $id = $_POST['id'];

                    $this->query = 'UPDATE `libros` SET titulo=?, autor=?, categoria=?, estado_libro=?, sinopsis=?, cota=? WHERE id_libro=?';

                    $this->rows = array(&$cota, &$titulo, &$autor, &$categoria, &$estado, &$sinopsis, &$id);
                    return $this->execute_single_query('ssisssi', $this->rows);
                }
            }
        }

        public function delete () {
            if ($_GET) {
                $this->query = "DELETE FROM libros WHERE cota='" . $_GET['id']."'";
                $id = $_GET['id'];
                $this->rows = array(&$id);
                $this->execute_single_query('i', $this->rows);
            }
        }
        
        public function historial() {}

        public function updateInventario ($cota, $valInv) {
            $this->query = 'UPDATE `libros` SET cantidad=? WHERE id_libro=?';
            $this->rows = array(&$valInv, &$cota);
            $this->execute_single_query('ii', $this->rows);
        }

        public function inhabilitar() {}

        public function prestamos () {

            $this->query = "SELECT p.id_p, p.id_libro2, p.numero_carnet2, s.id_sol, s.nom_sol, s.ape_sol, l.id_libro, p.fecha_entrega, p.fecha_devolucion FROM prestamo p INNER JOIN solicitantes s ON p.numero_carnet2 = s.id_sol INNER JOIN libros l ON p.id_libro2 = l.id_libro WHERE id_libro2='" . $_GET['id']."'";

            $this->get_result_from_query();
            return $this->rows;
        }
    }