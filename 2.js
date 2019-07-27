is_username_valid("Xrutaf888");
is_password_valid("passW0rd=");

function is_username_valid(usernameValue){

	// Validate Alphabet
	let findAlphabet = usernameValue.match(/[A-Z]/g) || [];

	if(findAlphabet.length > 0){

		// Find Small Letter
		let findSmallletter = usernameValue.match(/[a-z]/g) || [];

		if(findSmallletter.length > 0){

			// Username cannot start with a number / special character.
			let findCharNum = usernameValue.match(/[^A-Za-z]/g) || [];

			if(usernameValue.charAt(0) != findCharNum[0]){

				// Min 5 Character
				if(!usernameValue.length <= 5){

					// Max 9 Charachter
					if(usernameValue.length >= 9){
						console.log("true");
						return true;
						
					}
					else{
						console.log("false");
						return false;
					}
				}

				else{
					console.log("false");
					return false;
				}
			}
			else{
				console.log("false");
				return false;
			}
		}

	}
	else{
		console.log("false");
		return false;
	}

}

function is_password_valid(passwordValue){
	// Find Small Letter
	let findSmallletter = passwordValue.match(/[a-z]/g) || [];
	if(findSmallletter.length > 0){
		
		// Find Alphabet
		let findAlphabet = passwordValue.match(/[A-Z]/g) || [];
		if(findAlphabet.length > 0){
			
			// Find Number
			let findNumber = passwordValue.match(/[0-9]/g) || [];
			if(findNumber.length > 0 ){

				// Find special Char
				let findChar = passwordValue.match(/[^A-Za-z0-9]/g) || [];
				if(findChar.length > 0){

					// Find char “=” 
					let findChar = passwordValue.match(/[=]/g) || [];
					if(findChar.length > 0){

						// Min 8
						if(!passwordValue.length <= 8){
							console.log("true");
						}
						else{
							console.log("flase");
							return false;
						}	
					}
					else{
						console.log("flase");
						return false;
					}
					
				}
				else{
					console.log("flase");
					return false;
				}
				
			}
		}
		else{
			console.log("flase");
			return false;
		}
	}
	else{
		console.log("flase");
		return false;
	}
}