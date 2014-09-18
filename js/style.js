function checkComments () {
	ele = document.getElementsByTagName("li");

	for (j=0; j<ele.length; j++) {
		if ( ele[j].lastChild ) {
			for (i=0; i<ele.length; i++) {
				if (ele[j].lastChild.nodeValue == ele[i].firstChild.nodeValue) {
					tmp = ele[j];
					return;// 整理回复评论
				}

			}
		}
	}
}
