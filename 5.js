function count_vowels(str){
	let a = str.match(/a/g) || [];
	let i = str.match(/i/g) || [];
	let u = str.match(/u/g) || [];
	let e = str.match(/e/g) || [];
	let o = str.match(/o/g) || [];



	let result = a.length + i.length + u.length + e.length + o.length;
	console.log(result);
	return result;
}

count_vowels("programmer");
