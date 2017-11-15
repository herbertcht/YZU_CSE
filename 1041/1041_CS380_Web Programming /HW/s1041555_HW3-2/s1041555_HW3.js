function progress(){
	var txt = document.form.txt.value;
	var line = txt.split("\n"); // 每一行內容
	var line_num = line.length; // 共有幾行
	var onlyValue = new Array();
	var values = new Array();
	var check = 0;
	var result = false;
	for (var i = 0; i<line_num; i++)
	{
		
	    var seq = line[i].split(" "); //seq[0]: label名稱, seq[1] : context
		// YOUR CODE START
		var label = seq[0];
		var context = seq[1];
		for(var j = 0;j<onlyValue.length;j++){
			if(onlyValue[j] == label){
				check = j;
				break;
			}
		}
		if(onlyValue.indexOf(label) == -1)
		{
			onlyValue[onlyValue.length] = label;
			values[onlyValue.indexOf(label)] = new Array();
			values[onlyValue.indexOf(label)][values[onlyValue.indexOf(label)].length] = context;
		}else{
			values[onlyValue.indexOf(label)][values[onlyValue.indexOf(label)].length] = context;
		}
		
		// YOUR CODE END
	}
	
	var out="<table>"; // 結果存在變數out, 用table顯示
	// YOUR CODE START
	var temp;
	for(var i = 0;i<onlyValue.length;i++){
		if(strcmp(onlyValue[i],onlyValue[i+1]) == 1){
			temp = onlyValue[i];
			onlyValue[i]=onlyValue[i+1];
			onlyValue[i+1] = temp;
			if(values[i].length < values[i+1].length){
				for(var j = 0;j<values[i+1].length;j++){
					temp = values[i][j];
					values[i][j] = values[i+1][j];
					values[i+1][j] = temp;
				}
			}else{
					for(var j = 0;j<values[i].length;j++){
					temp = values[i][j];
					values[i][j] = values[i+1][j];
					values[i+1][j] = temp;
				}
			}
		}
	}
	/*
	alert(onlyValue[0]);
	alert(values[0]);
	alert(onlyValue[1]);
	alert(values[1]);
	alert(onlyValue[2]);
	alert(values[2]);
	*/
	var maxLength = values[0].length;
	var length = values.length;
	for(var i = 1;i<onlyValue.length;i++){
		if(maxLength < values[i].length){
			maxLength = values[i].length;
		}
	}
	
	//alert(maxLength);
	
	out += "<tr>";
	for(var i = 0;i<onlyValue.length;i++){
		out += "<td>" + onlyValue[i] + "</td>";
	}
	out += "</tr>";
	for(var i = 0;i<maxLength;i++){
		out += "<tr>";
		for(var j = 0;j<values.length;j++){
			
			if(!values[j][i]){
				out += "<td></td>";
			}else{
				out += "<td>" + values[j][i] + "</td>";
			}
		}
		out += "</tr>";
	}
	// YOUR CODE END
	out=out+"</table>"
	document.getElementById('out').innerHTML=out; // 顯示結果
	
}
function strcmp(str1, str2) {
  //   example 1: strcmp( 'waldo', 'owald' );
  //   returns 1: 1
  //   example 2: strcmp( 'owald', 'waldo' );
  //   returns 2: -1
  return ((str1 == str2) ? 0 : ((str1 > str2) ? 1 : -1));
}