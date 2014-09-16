function del_comment($id) {
	var thePage = 'del_comment.php';
	var theURL = thePage + "?id=" + $id;
	myReq.open = ('GET', theURL, true);
	myReq.onreadystatechange = theHTTPResponse;
}

function theHTTPResponse() {
	if (myReq.readyState == 4) {
		if (myReq.status == 200) {
			var theNode =	// 如何获得 li 节点，进而通过 DOM 去除 
		}
	}
}
