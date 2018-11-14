<?
class admin_create_table_login
{
		//en se servant des infos du config checker si la table login existe si pas appeller la classe de create sql
	$res_sql = "SELECT ID FROM USERS";
$result = mysqli_query($dbConnection, $query);

if(empty($result)) {
                $query = "CREATE TABLE USERS (
                          ID int(11) AUTO_INCREMENT,
                          EMAIL varchar(255) NOT NULL,
                          PASSWORD varchar(255) NOT NULL,
                          PERMISSION_LEVEL int,
                          APPLICATION_COMPLETED int,
                          APPLICATION_IN_PROGRESS int,
                          PRIMARY KEY  (ID)
                          )";
                $result = mysqli_query($dbConnection, $query);
}
}