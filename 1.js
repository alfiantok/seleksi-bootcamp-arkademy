let biodata = [
	{"name":"alfian"},
	{"age":18},
	{"address":"Wirobrajan, Yogyakarta"},
	{"hobbies":["coding","learning progaramming"]},
	{"is_married ":false},
	{"list_school ":[
		{
			"Name" : "SD Tamansari 2 Yogyakarta",
			"year_in" : "2006",
			"year_out" : "2011",
		},
		{
			"Name" : "SD MIM Amurang",
			"year_in" : "2011",
			"year_out" : "2012",
		},
		{
			"Name" : "SMPN 2 Amurang",
			"year_in" : "2012",
			"year_out" : "2012",
		},
		{
			"Name" : "SMP Mataram Bantul",
			"year_in" : "2012",
			"year_out" : "2012",
		},
		{
			"Name" : "SMP Mataram Bantul",
			"year_in" : "2012",
			"year_out" : "2016",
		},
		{
			"Name" : "SMKN 3 Yogyakarta",
			"year_in" : "2016",
			"year_out" : "2019",
		}
	]},
	{"skills ":[
		{"HTML":"expert"},
		{"CSS":"expert"},
		{"JS":"advanced"},
		{"PHP":"advanced"},
		{"LARAVEL":"advanced"},
		{"WORDPRESS":"advanced"},
		{"VUE JS":"beginner"},
		{"Construct 2":"advanced"},
		{"Unity Game Engine":"advanced"},
		{"Inkscape":"advanced"},
		{"Photoshop":"advanced"},
		{"Adobe XD":"beginner"},
	]},
	{"interest_in_coding ":true},
];


function jsonParse(data){
	return data;
}


console.log(jsonParse(biodata));