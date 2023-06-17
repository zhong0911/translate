<?php
require './php/Translation.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST['action']) ? htmlspecialchars($_POST['action']) : '';
    switch ($action) {
        case "translate":
        {
            $original = isset($_POST['original']) ? htmlspecialchars($_POST['original']) : '';
            $from = isset($_POST['from']) ? htmlspecialchars($_POST['from']) : '';
            $to = isset($_POST['to']) ? htmlspecialchars($_POST['to']) : '';
            switch ($from) {
                case "zh":
                {
                    switch ($to) {
                        case "en":
                        {
                            $translation = chineseToEnglish($original);
                            $params = array(
                                'success' => true,
                                'message' => 'translation successful',
                                'translation' => $translation
                            );
                            $result = json_encode($params, true);
                            echo $result;
                        }
                        default:
                        {
                            $params = array(
                                'success' => true,
                                'message' => 'translation failed',
                                'translation' => ''
                            );
                            $result = json_encode($params, true);
                            echo $result;
                        }
                    }
                }
                default:
                {
                    echo json_encode(
                        array(
                            'success' => true,
                            'message' => 'translation failed',
                            'translation' => ''
                        ),
                        true
                    );
                }
            }
        }
        default:
        {
            $params = array(
                'success' => true,
                'message' => 'translation failed',
                'translation' => ''
            );
            $result = json_encode($params, true);
            echo $result;
        }
    }
}
