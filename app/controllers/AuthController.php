<?php

class AuthController extends Controller {
    public function index() {
        session_start();
        if (isset($_SESSION['user_id'])) {
            header('Location: /eisenhower-app/public/dashboard');
            exit;
        }

        $title = 'Login';
        $view = '../app/views/auth/login.php';
        require_once '../app/views/layouts/auth.php';
    }

    public function login() {
        session_start();

        $username = $_POST['username'];
        $password = $_POST['password'];

        $userModel = new Users();
        $user = $userModel->getByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header('Location: /eisenhower-app/public/dashboard');
            exit;
        } else {
            $_SESSION['error'] = 'Username atau password salah.';
            header('Location: /eisenhower-app/public/login');
            exit;
        }
    }

    public function registerForm() {
        session_start();
        if (isset($_SESSION['user_id'])) {
            header('Location: /eisenhower-app/public/dashboard');
            exit;
        }

        $title = 'Register';
        $view = '../app/views/auth/register.php';
        require_once '../app/views/layouts/auth.php';
    }

    public function register() {
        session_start();

        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        if ($password !== $confirm) {
            $_SESSION['error'] = 'Password dan konfirmasi tidak sama.';
            header('Location: /eisenhower-app/public/register');
            exit;
        }

        $userModel = new Users();
        $existing = $userModel->getByUsername($username);

        if ($existing) {
            $_SESSION['error'] = 'Username sudah digunakan.';
            header('Location: /eisenhower-app/public/register');
            exit;
        }

        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $userModel->insertUser($username, $hashed);

        $_SESSION['success'] = 'Registrasi berhasil. Silakan login.';
        header('Location: /eisenhower-app/public/login');
        exit;
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /eisenhower-app/public/login');
        exit;
    }
}
