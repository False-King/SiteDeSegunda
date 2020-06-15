var users = JSON.parse(localStorage.getItem("users")) || []

function Cadastrar(){
    var nome = document.getElementById("nomeuser").value
    var email = document.getElementById("email").value
    var sexo = document.querySelector("input[name = sexo]:checked ")
    var endereco = document.getElementById("endereco").value
    var telefone = document.getElementById("telefone").value
    var celular = document.getElementById("celular").value
    var senha = document.getElementById("senha").value
    var niver = document.querySelector("input[name = nasc]")
    var estado = document.querySelector("select[id = estadocivil]")
    var confsenha = document.querySelector("#confsenha")

    if(senha=confsenha.value){
        user = {Nome: nome,
            Email: email,
            Sexo: sexo.value ,
            Endereco: endereco,
            Telefone: telefone,
            Celular: celular,
            Senha:senha,
            DataDeNascimento: niver.value,
            EstadoCivil:estado.value
        }
        
        users.push(user)
        storage()
        alert('Cadastrado com sucesso')
    }else{
        alert('Confirmação de senha diferente da senha')
    }

        
}

function storage(){
    localStorage.setItem("users",JSON.stringify(users))
}
function Logar(){
    var emaillogin = document.querySelector("#emaillogin")
    var senhalogin = document.querySelector("#senhalogin")
    var x
    users.forEach((user,index)=>{
        if (emaillogin.value == user.Email && senhalogin.value == user.Senha){
            x = index 
        }
    })
    if(x == null){
        alert("Usuário não encontrado")
    }else{
        alert(users[x].Nome+", Bem vindo")
    }
    

}


