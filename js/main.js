$(document).ready(() => {
	$('#searchForm').on('submit', (e) => {
		var searchText = $('#searchText').val();
		getBooks(searchText);
		e.preventDefault();
	})
});
var book_title;
var buy_link;
function getBooks(searchText) {
	$('#preloader').removeClass('hidden');
	axios.get('https://www.googleapis.com/books/v1/volumes?q=' + searchText)
	.then((response) => {
		console.log(response);
		var books = response.data.items;
		var output = '';
		$.each(books, (index, book) => {
			//console.log(book.accessInfo)
			output += "<div class='col-md-3'>";
			output += "<div class='well text-center'>";
			if (book.volumeInfo.imageLinks != undefined) {
				output += "<img src= " + book.volumeInfo.imageLinks.thumbnail + " />";
			} else {
				output += "<img src= 'img/book.jpg' />";
			}
			book_title =  book.volumeInfo.title.length > 32 ? book.volumeInfo.title.substring(0, 32) + '...' : book.volumeInfo.title;
			buy_link = book.saleInfo.buyLink;
			
			output += "<h3 class='text-center'>" + book_title +"</h3>";
			output += "<form action='addWish.php' method='post'>"
			
			output += "<a class='btn btn-danger' href='#' onclick= bookselected('"+ book.id +"') >View</a>  ";
			
			output += "<button type='submit' class='btn btn-danger'> &#128151 </button>" ;
			output += "<input id='hide' type='text' name='book' value='"+book.id+"'>  ";	
			output += "<input id='hide' type='text' name='name' value='"+book_title+"'> ";	
				      
			output += " </form> </div>";
			output += "</div>";
		});
		$('#preloader').addClass('hidden');
		$('#books').html(output);
	})
	.catch((err) => {
		console.log(err);
	});
}

function bookselected(id) {
	//alert(id)
	sessionStorage.setItem('bookId' , id);
	window.open('book.php', '_blank');
	return false;
}

function getbook() {
	

	//var book_title =  book.volumeInfo.title.length > 32 ? book.volumeInfo.title.substring(0, 32) + '...' : book.volumeInfo.title;
	var id = sessionStorage.getItem('bookId');
	axios.get('https://www.googleapis.com/books/v1/volumes/' + id)
	.then((response) => {
		$('#book').removeClass('hidden');
		console.log(response);	
		var buy = response.data.saleInfo;
		var info = response.data.volumeInfo;
		var cat = info.categories;
		console.log(cat);
		var authors = info.authors;
		var output = '';
		output += "<div class='row'>"; 
		output += "<div class='col-md-4'>";
		if (info.imageLinks != undefined) {
			output += "<img src= " + info.imageLinks.thumbnail + " /><br/>";
		}
		output += "<br>"
		output += "<a class='btn btn-danger' id='go_button' href='display.php'>Go Back To Search</a> ";
		output += "<form action='addWish.php' method='post'>"
		output += "<button type='submit' class='btn btn-danger'> &#128151 </button> " ;
		if(buy.buyLink == undefined){
			output += "<a class='btn btn-danger' id='go_button' onclick='notAvail()'>Buy</a>";
		}
		else{
		output += "<a class='btn btn-danger' id='go_button' href='"+ buy.buyLink +"'>Buy</a>";
		}
		output += "<input id='hide' type='text' name='book' value='"+ book.id +"'>  ";	
		output += "<input id='hide' type='text' name='name' value='"+book_title+"'> ";
		output += "</form> </div>";
		output += "<div class='col-md-8'>";
		output += "<h2><strong>Title:</strong>"+ info.title + "</h2>";
		output += "<h3><strong>SubTitle:</strong>" + info.subtitle + "</h3>";
		output += "<h3>Authors: ";
		for (var i = 0; i < authors.length; i++) {
			output += authors[i] + " ";
		}
		output += "</h3>";
		output += "<ul class='list-group'>";
		output += "<li class='list-group-item'><strong>Categories</strong></li>";
		for (var j = 0; j < cat.length; j++) {
			output += "<li class='list-group-item'>"+ (j+1) + ". " + cat[j] +"</li>";
		}
		output += "</ul>"
		output += "<p><strong>Description:</strong>";
		var dis = info.description.length > 250 ? info.description.substring(0, 250) + '...' : info.description;
		output += dis +  "</p>";
		output += "</div>";
		output += "</div>";
		$('#preloader').addClass('hidden');
		$('#book').html(output);
	})
	.catch((err) => {
		console.log(err);
	});
}
function notAvail(){
	alert("Currently Not Available")
}