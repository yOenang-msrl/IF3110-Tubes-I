<?php
class User
{
	public function index(array $var)
	{
		if (isset($_SESSION['username']))
		{
			$v = new View('user/home');
			$v->render();
		}
		else
		{
			header("Location: ".SITE_ROOT.NAME_ROOT."/index.php/user/login");
		}
	}

	public function register(array $var)
	{
		if (isset($var['submit']))
		{
			$u = new User_Model();
			$u->addUser($var['username'],$var['password'],$var['nama_lengkap'],$var['HP'],$var['alamat'],$var['provinsi'],$var['kota'],$var['kabupaten'],$var['kodepos'],$var['email'],0);
			echo "Registrasi Berhasil";
		}
		else
		{
			$v = new View('user/register');
			$v->render();
		}
	}

	public function login(array $var)
	{
		if (isset($_SESSION['username']))
		{
			//jika sudah login
			header("Location: ".SITE_ROOT.NAME_ROOT."/index.php/user");
		}
		else
		{
			if (isset($var['submit']))
			{
				$u = new User_Model();
				$ret = $u->isUserExists($var['username'],$var['password']);
				if ($ret->username != null) //jika objek username tidak null
				{
					$_SESSION['username'] = $ret->username; //username akan disimpan
					$_SESSION['nama_lengkap'] = $ret->nama_lengkap; //nama lengkap
					$_SESSION['HP'] = $ret->HP;
					$_SESSION['alamat'] = $ret->alamat;
					$_SESSION['provinsi'] = $ret->provinsi;
					$_SESSION['kodepos'] = $ret->kodepos;
					$_SESSION['email'] = $ret->email;
					$_SESSION['password'] = $ret->password;
					$_SESSION['kota'] = $ret->kota;
					$_SESSION['kabupaten'] = $ret->kabupaten;
					$_SESSION['isCreditCard'] = $ret->isCreditCard;
					header("Location: ".SITE_ROOT.NAME_ROOT."/index.php/user");
				}
				else
				{
					$v = new View('user/login');
					$v->setData('pesan','Login salah');
					$v->render();
				}
			}
			else
			{
				$v = new View('user/login');
				$v->render();
			}
		}
	}

	public function logout(array $var)
	{
		session_destroy();
		header("Location: ".SITE_ROOT.NAME_ROOT."/index.php");
	}
}

