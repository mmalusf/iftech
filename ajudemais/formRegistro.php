<?php include "header.php" ?>

<div class="container text-center mb-3 mt-3">

    <h2>Registro:</h2>
    <div class="d-flex justify-content-center mb-3">
        <div class="row">
            <div class="col-12">
                <form action="actionDoador.php?pagina=formDoador" method="POST" class="was-validated" enctype="multipart/form-data">
                    <div class="form-floating mb-3 mt-3">
                        <input type="file" class="form-control" id="fotoDoador" name="fotoDoador" required>
                        <label for="fotoDoador">Foto</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="cpfDoador" placeholder="cpf" name="cpfDoador" required>
                        <label for="cpfDoador">CPF</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="nomeDoador" placeholder="Nome" name="nomeDoador" required>
                        <label for="nomeDoador">Nome Completo</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="date" class="form-control" id="dataNascimentoDoador" placeholder="Data de Nascimento" name="dataNascimentoDoador" required>
                        <label for="dataNascimentoDoador">Data de Nascimento</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="form-floating mb-3 mt-3">
                        <select class="form-select" id="cidadeDoador" name="cidadeDoador" required>
                            <option value="curiuva">Curiúva</option>
                            <option value="imbau">Imbaú</option>
                            <option value="ortigueira">Ortigueira</option>
                            <option value="reserva">Reserva</option>
                            <option value="telemacoBorba" selected>Telêmaco Borba</option>
                            <option value="tibagi">Tibagi</option>
                        </select>
                        <label for="cidadeDoador">Cidade</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="telefoneDoador" placeholder="Telefone" name="telefoneDoador" required>
                        <label for="telefoneDoador">Telefone</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="email" class="form-control" id="emailDoador" placeholder="Email" name="emailDoador" required>
                        <label for="emailDoador">Email</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="senhaDoador" placeholder="Senha" name="senhaDoador" required>
                        <label for="senhaDoador">Senha</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="confirmarSenhaDoador" placeholder="Confirme a Senha" name="confirmarSenhaDoador" required>
                        <label for="confirmarSenhaDoador">Confirme a Senha</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
        <br>
    </div>

</div>
                

<?php include "footer.php" ?>