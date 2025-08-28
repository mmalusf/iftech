<?php include "header.php" ?>

<div class="container text-center mb-3 mt-3">

    <h2>Cadastro de ONG:</h2>
    <div class="d-flex justify-content-center mb-3">
        <div class="row">
            <div class="col-12">
                <form action="actionONG.php?pagina=formONG" method="POST" class="was-validated" enctype="multipart/form-data">
                    
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="nomeOng" placeholder="Nome" name="nomeOng" required>
                        <label for="nomeOng">Nome</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <select class="form-select" id="enderecoOng" name="enderecoOng" required>
                            <option value="curiuva">Curiúva</option>
                            <option value="imbau">Imbaú</option>
                            <option value="ortigueira">Ortigueira</option>
                            <option value="reserva">Reserva</option>
                            <option value="telemacoBorba" selected>Telêmaco Borba</option>
                            <option value="tibagi">Tibagi</option>
                        </select>
                        <label for="enderecoOng">Endereço</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="telefoneOng" placeholder="Telefone" name="telefoneOng" required>
                        <label for="telefoneOng">Telefone</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="causaOng" placeholder="Text" name="causaOng" required>
                        <label for="CausaOng">Causa</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="necessidadeOng" placeholder="Text" name="necessidadeOng" required>
                        <label for="NecessidadeOng">Necessidade</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="file" class="form-control" id="fotoOng" name="fotoOng" required>
                        <label for="fotoOng">Foto</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="email" class="form-control" id="emailOng" placeholder="email" name="emailOng" required>
                        <label for="emailOng">Email</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="senhaOng" placeholder="Senha" name="senhaOng" required>
                        <label for="senhaOng">Senha</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
            
                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="confirmarSenhaOng" placeholder="Confirme a Senha" name="confirmarSenhaOng" required>
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