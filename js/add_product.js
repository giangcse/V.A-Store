function hangsx(){
					var loai = document.getElementById("loai").value;

					switch (loai) {
						case 'MD':{
							document.getElementById("hang").innerHTML = '<option value="AC">Acer</option> <option value="AS">Asus</option> <option value="AP">Apple</option> <option value="DE">Dell</option> <option value="HP">HP</option> <option value="LN">Lenovo</option> <option value="LG">LG</option> <option value="MS">MSI</option> <option value="RZ">Razer</option>';
							break;
						}
						case 'WS':{
							document.getElementById("hang").innerHTML = '<option value="DE">Dell</option> <option value="HP">HP</option> <option value="LN">Lenovo</option>';
							break;
						}
						case 'OF':{
							document.getElementById("hang").innerHTML = '<option value="AC">Acer</option> <option value="AS">Asus</option> <option value="AP">Apple</option> <option value="DE">Dell</option> <option value="HP">HP</option> <option value="LN">Lenovo</option> <option value="LG">LG</option>';
							break;
						}
						case 'PC':{
							document.getElementById("hang").innerHTML = '<option value="AC">Acer</option> <option value="AS">Asus</option> <option value="AP">Apple</option> <option value="DE">Dell</option> <option value="GG">Gigabyte</option> <option value="HP">HP</option> <option value="LN">Lenovo</option> <option value="MS">MSI</option>';
							break;
						}
						case 'GE':{
							document.getElementById("hang").innerHTML = '<option value="CS">Corsair</option> <option value="FL">Fuhlen</option> <option value="LO">Logitech</option> <option value="RZ">Razer</option> <option value="ST">Steelseries</option>';
							break;
						}
						case 'GM':
							document.getElementById("hang").innerHTML = '<option value="AC">Acer</option> <option value="AS">Asus</option> <option value="DE">Dell</option> <option value="HP">HP</option> <option value="LN">Lenovo</option> <option value="MS">MSI</option> <option value="RZ">Razer</option>';
							break;
					}
				}

				function validate(){
					var ten = document.getElementById("ten").value;
					var gia = document.getElementById("gia").value;
					var loai = document.getElementById("loai").value;
					var hang = document.getElementById("hang").value;
					var hinh = document.getElementById("hinh").value;

					if (ten == "" || gia == "" || loai == "" || hang == "" || hinh == "") {
						Swal.fire({
							type: 'error',
							title: 'Sản phẩm chưa được thêm!',
							showConfirmButton: false,
							timer: 1500
						  });
						return false;
					}else{
						Swal.fire({
							type: 'success',
							title: 'Đã thêm sản phẩm!',
							showConfirmButton: false,
							timer: 1500
						  });
						return true;
					}
				}