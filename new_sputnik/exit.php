<?php
	session_start();
	if(empty($_SESSION['user']))
	{
	//���� �� ���������� ������ � ������� � �������, ������ ��    ���� ���� ����� ���������� ������������. ��� ��� �� �����. ������ ���������    �� ������, ������������� ������
	exit ("������ �� ���    �������� �������� ������ ������������������ �������������. ���� ��    ����������������, �� ������� �� ���� ��� ����� ������� � �������<br><a    href='logged_in.php'>�������    ��������</a>");
	}
	unset($_SESSION['user']);
	unset($_SESSION['id']);//    ���������� ���������� � �������
	unset($_SESSION['first']);
	unset($_SESSION['last']);
	unset($_SESSION['amountPages']);
	exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>");
	// ���������� ������������ �� ������� ��������.
?>