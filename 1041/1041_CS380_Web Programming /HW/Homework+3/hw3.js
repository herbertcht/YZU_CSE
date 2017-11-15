function progress(){
	var txt = document.form.txt.value;
	var line = txt.split("\n"); // 每一行內容
	var line_num = line.length; // 共有幾行
	for (var i = 0; i<line_num; i++)
	{
	    var seq = line[i].split(" "); //seq[0]: label名稱, seq[1] : context
		// YOUR CODE START
		
		// YOUR CODE END
	}
	var out="<table>"; // 結果存在變數out, 用table顯示
	// YOUR CODE START
		
	// YOUR CODE END
	out=out+"</table>"
	document.getElementById('out').innerHTML=out; // 顯示結果

}