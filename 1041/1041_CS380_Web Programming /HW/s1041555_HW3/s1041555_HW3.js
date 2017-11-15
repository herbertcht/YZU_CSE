function progress(){
	var txt = document.form.txt.value;
	var line = txt.split("\n"); // 每一行內容
	var line_num = line.length; // 共有幾行
	var onlyValue = new Array();
	var values = new Array();
	for (var i = 0; i<line_num; i++)
	{
	    var seq = line[i].split(" "); //seq[0]: label名稱, seq[1] : context
		// YOUR CODE START
		var label = seq[0];
		var context = seq[1];
		if(onlyValue.lastIndexOf(label) == -1)
		{
			onlyValue.push(label);
			values[onlyValue.lastIndexOf(label)] = new Array;
		}
		values[onlyValue.lastIndexOf(label)].push(context);
		// YOUR CODE END
	}
	var out="<table>"; // 結果存在變數out, 用table顯示
	// YOUR CODE START
	
	var maxLength = 0;
	var length = values.length;
	
	for(var i = 0;i<values.length;i++)
	{
		if(values[i].length <= maxLength)
		{
			continue;
		}else
		{
			maxLength = values[i].length;
		}
	}
	out += "<tr>";
	for(var i = 0;i<length;i++)
	{
		out += "<td>"+ onlyValue[i] +"</td>";
	}
	out += "</tr>"
    for (var i = 1; i <= maxLength; i++)
     {
       out += "<tr>"
        for (var j = 0; j < length; j++)
        {
           if (values[j][i-1])
			{
				out += "<td>" + values[j][i-1] + "</td>";
			}
           else
             out += "<td></td>";
		}
      out += "</tr>"
    }
	// YOUR CODE END
	out=out+"</table>"
	document.getElementById('out').innerHTML=out; // 顯示結果
}