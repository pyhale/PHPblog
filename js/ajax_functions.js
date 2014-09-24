function getXMLHTTPRequest(){
	var req = false;
	try{
		/*  for Firefox */
		req = new XMLHttpRequest();
	} catch (err) {
		try {
			/* for some versions fo IE */
			req = new ActiveXObject("Msxm12.XMLHTTP");
		} catch (err) {
			try {
				/* for some other versinos of IE */
				req = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (err) {
				req = false;
			}
		}
	}
	return req;
}

function postComment() {

	comment = document.comment;
	post_id = comment.post_id.value;
	title = comment.title.value;
	content = comment.content.value;
	postStr = "post_id="+post_id+"&title="+title+"&content="+content;

	myReq = getXMLHTTPRequest();
	thePage = 'comment_post.php';
	myReq.open("POST", thePage, true);
	myReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	myReq.onreadystatechange = function() {
		if (myReq.readyState == 4) {
			if (myReq.status == 200) {
				result = myReq.responseText;
				result_array = result.split(",");

				node = document.createElement('li');
				p01 = document.createElement('p');
				textnode = document.createTextNode(result_array[0]);
				p01.appendChild(textnode);
				node.appendChild(p01);
				p02 = document.createElement('p');
				textnode = document.createTextNode(result_array[1]);
				p02.appendChild(textnode);
				node.appendChild(p02);
				hr = document.createElement('hr');
				node.appendChild(hr);

				document.getElementById('comments').appendChild(node);
			}
		}
};
	myReq.send(postStr);
}

function delComment(id) {

	myReq = getXMLHTTPRequest();
	theURL = "del_comment.php?id=" + id;
	myReq.open("GET", theURL, true);
	myReq.onreadystatechange = function() {
		if (myReq.readyState == 4) {
			if (myReq.status == 200) {
				return;
			}
		}
	};
	myReq.send(null);
}

function delPost(id) {

	myReq = getXMLHTTPRequest();
	theURL = "del_post.php?id=" + id;
	myReq.open("GET", theURL, true);
	myReq.onreadystatechange = function() {
		if (myReq.readyState == 4) {
			if (myReq.status == 200) {
				return;
			}
		}
	};
	myReq.send();
}
