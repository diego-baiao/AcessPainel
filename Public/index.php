<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
             require_once "Customize/frontend/head.php"; 
             require_once "Customize/frontend/framBasic.php"; 
        ?>
        <title>Login - Access</title>
        <script src="Customize/backend/ajax/verifyUser.js"></script>
    </head>
    <body class="text-center adm">
        <div class="container-sm">              
            <!-- <h3>LOGIN ACCESS</h3> -->

            <form class="form-signin" action="#">
            <!-- <img class="mb-4" src="public/img/logo.png" alt="" width="80%"> -->
            <h4>Painel - Administrativo</h4>

            <div class="form-label-group label-float">
                <input type="text" id="UserName" name="username" minlength="6" pattern="[a-zA-Z]+$" required autofocus="">
                <label>User Name</label>
            </div>

            <!--
                * Pelo menos uma letra maiúscula em inglês
                * Pelo menos uma letra minúscula em inglês
                * Pelo menos um dígito
                * Pelo menos um caractere especial
                * Comprimento mínimo de oito
            -->
            <div class="form-label-group label-float">
                <input type="password" id="senha" pattern="^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$" required="" autofocus="">
                <label>PassWord</label>
            </div>

            <br>
            
            <div class="checkbox p-2 mb-2 bg-dark text-white rounded">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label h7 mb-7 font-weight-bold text-white" for="exampleCheck1">Lembrar-me</label>
            </div>

            <!-- <br> -->
            <button class="btn btn-lg btn-success btn-block" type="submit">Acessar</button>
            <!-- <p class="mt-5 mb-3 font-weight-bold text-white"></p> -->

            <div class="extraOptions">
                <!-- Botão de Create Account -->
                <button type="button" class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#CreateAccountModal">
                    Create Account
                </button>
                <!-- Botão de Create Account -->

                <!-- Botão de Recuperar Senha -->
                <button type="button" class="btn btn-lg btn-danger btn-block" data-toggle="modal" data-target="#ExemploModalCentralizado">
                    Recuperar acesso
                </button>
                <!-- Botão de Recuperar Senha -->
            </div>

            <div class="footer fixed-bottom p-1 bg-secondary text-white">Powered By - DBR - v1.2</div>
        </form>

        <!-- conteudo chama modal -->
        <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TituloModalCentralizado">Recuperar meu acesso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <form class="form-signin" method="post" action="restore_access/envia_form.php">
                            <div class="form-label-group">
                                <label for="recprimeironome">Insira o primeiro nome cadastrado</label>
                                <input type="text" name="recprimeironome" id="recprimeironome" class="form-control" placeholder="Entre com o primeiro nome cadastrado" required>
                            </div>
                            <div class="form-label-group">
                                <label for="recemail">Insira o email cadastrado</label>
                                <input type="email" name="recemail"  id="recemail" class="form-control" placeholder="Entre com o seu email cadastrado" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button class="btn btn-primary btn-block" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- conteudo chama modal -->

        <!-- conteudo chama modal -->
        <div class="modal fade" id="CreateAccountModal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalCentralizado">Create Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    <form method="POST" action="#" onsubmit="return checkall();">
                        <input type="text" name="username" id="UserName" onkeyup="checkname();">
                        <span id="name_status"></span>
                        <br>
                        <!-- <input type="submit" name="submit_form" value="Submit"> -->
                    </form>

                    <!-- <form class="form-signin" action="Token.php" method="post"> -->

                        <!-- <div class="form-label-group  label-float">   
                            <input type="text" name="UserName" class="form-control" id="UserName" placeholder="UserName" minlength="3" pattern="[a-zA-Z]+$" onkeyup="checkname();" required>      
                            <span id="name_status"></span>         
                            <div class="invalid-feedback">nameToken inválido!</div>
                        </div> -->

                        <!-- <div class="form-label-group  label-float">   
                            <input type="text" name="nameToken" class="form-control" id="nameToken" placeholder="nameToken" minlength="3" pattern="[a-zA-Z]+$" required>               
                            <div class="invalid-feedback">nameToken inválido!</div>
                        </div>

                        <div class="form-label-group label-float">
                            <input type="password" name="secretToken" class="form-control" id="secretToken" minlength="3" pattern="[a-zA-Z0-9]+$" placeholder="secretToken">
                            <input type="checkbox" onclick="show()"> Mostrar senha
                            <div class="invalid-feedback">SecretToken inválido!</div>
                        </div>

                        <div class="form-label-group">
                            <input type="text" name="subjectToken" class="form-control" id="validationCustom02" placeholder="subjectToken" minlength="3" pattern="[a-zA-Z]+$" required>
                            <div class="invalid-feedback">subjectToken inválido!</div>
                        </div>

                        <div class="form-label-group">
                            <input type="email" name="emailToken" class="form-control" id="validationCustom02" placeholder="emailToken" minlength="3" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                            <div class="invalid-feedback">EmailToken inválido!</div>
                        </div>

                        <div class="form-label-group">
                             <select name="expireToken" class="custom-select" id="validationCustom04" required>
                                <option option value="">Tempo de expiração</option>
                                <option value="02">dois minutos</option>
                                <option value="10">dez minutos</option>
                                <option value="30">trinta minutos</option>
                                <option value="60">sessenta minutos</option>
                            </select>
                            <div class="invalid-feedback">Informe uma cidade válida.</div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button class="btn btn-primary btn-block" type="submit">Enviar</button>
                        </div> -->
                      
                    <!-- </form> -->

                    </div>
                </div>
            </div>
        </div>
        <!-- conteudo chama modal -->

        </div>
    </body>
</html>