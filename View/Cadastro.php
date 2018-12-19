<!-- Modal -->
<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastre-se</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../Controller/Usuario.php" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" required="required" class="form-control" name="nome" id="nome" placeholder="Nome"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sobrenome" class="col-sm-2 col-form-label">Sobrenome</label>
                        <div class="col-sm-10">
                            <input type="text" required="required" class="form-control" name="sobrenome" id="sobrenome" placeholder="Sobrenome"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="whatsapp" class="col-sm-2 col-form-label">Whatsapp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="WhatsApp"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="celular" class="col-sm-2 col-form-label">Celular</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="celular" id="celular" placeholder="Celular"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="endereco" class="col-sm-2 col-form-label">Endereço</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cidade" class="col-sm-2 col-form-label">Cidade</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" required="required" class="form-control" name="email" id="email" placeholder="Email"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="senha" class="col-sm-2 col-form-label">Senha</label>
                        <div class="col-sm-10">
                            <input type="password" required="required" class="form-control" name="pass" id="senha" placeholder="senha"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" name="acao" value="Cadastrar">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


