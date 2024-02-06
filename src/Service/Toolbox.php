<?php

namespace App\Service;
class Toolbox
{
    public const GREEN = 'success';
    public const RED = 'danger';
    public const BLUE = 'info';

    public function addAlert(string $type, string $message)
    {
        $_SESSION['alerts'][] = [
            'type' => $type,
            'message' => $message
        ];
    }

    public static function displayAlert()
    {
        if (!empty($_SESSION['alerts'])) {
            foreach ($_SESSION['alerts'] as $alert) {
                switch ($alert['type']) {
                    case self::BLUE :
                        echo '<div role="alert" class="alert alert-info">' . $alert['message'] . '</div>';
                        break;
                    case self::GREEN :
                        echo '<div role="alert" class="alert alert-success">' . $alert['message'] . '</div>';
                        break;
                    case self::RED :
                        echo '<div role="alert" class="alert alert-danger">' . $alert['message'] . '</div>';
                        break;
                    default:
                        throw new Exception("la couleur n'existe pas");
                }
            }
        }
    }
}