let data = [
	["g","h","i","j"],
	["a","c","b","e","d"],
	["g","e","f"]
];
short_array(data);


function short_array(value){
	// Shorting data per array
	for (let i = 0; i < value.length; i++) {
		let shortByLetter = data[i].sort();
	}


	// Short Ascending
	let shortByLength = value.sort(function(a,b){
		return a.length - b.length;
	});


	console.log(shortByLength);
}
	