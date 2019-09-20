test favorite page

reprendre le style de la recherche quand elle sera faite,
en attendant 

<?
foreach($array_annonce_fav as $row_annonce)
{
	echo "<br><a href='/Recherche/Vues/Annonces/".$row_annonce->id."'>".$row_annonce->title."</a>";
}


?>