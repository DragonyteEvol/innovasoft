function showResposiveMenu() {
  document.getElementById("menu-mode").classList.toggle("show");
}

function alterId(id){
	document.getElementById("id_categorie").value=document.getElementById("id_categorie").value+' '+id;
}

function alterCategorie(id,categorie){
	document.getElementById('name-categories').innerHTML=document.getElementById('name-categories').innerHTML+"<button class='tag' title='borrar' onclick='dropCategorie(" + id + ")'>"+categorie+'</button>';
	alterId(id);
}

function dropCategorie(id){
	categories=document.getElementById("id_categorie").value.replace(id,'');	
	document.getElementById("id_categorie").value=categories;
}
