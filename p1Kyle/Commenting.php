<!-- Provision for commenting on an ingredient. Comments may only be entered by authenticated users. For Project 1 you need only redisplay the comment temporarily. To be clear, you need not yet build and archival store able to retain comments over time. That requirement will come in Project 2. -->

Comment: <input type="text" id="commentText" value="comment">
<button onclick="addComment()">Comment</button>
<p id="demo"></p>



<script>

function encodeHTML(s) {
    return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/"/g, '&quot;');
}

function addComment() {

	var loggedIn = "<?php echo $_SESSION["username"] ?>"; 
	var comment = document.getElementById("commentText").value;	

	if(loggedIn) {
		document.getElementById("demo").innerHTML = encodeHTML(comment);	
	} else {
		document.getElementById("demo").innerHTML = encodeHTML("Please login to comment!");
	}
}

</script>