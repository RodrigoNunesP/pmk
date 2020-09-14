<section style="min-height: calc(100vh - 83px)" class="light-bg">
  
  <div class="container">
    <div class="row">
      <div class="col-lg-offset-3 col-lg-6 text-center">
        <div class="section-title"><p>
          <h2>Doadores</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="tab-content">
      <div id="tab_user" class="tab-pane active">
        <div class="container-fluid">
          <a id="btn_add_donor" class="btn btn-primary"><i class="fa fa-plus">&nbsp;&nbsp;Adicionar Doador</i></a>
         
          <table id="dt_donors" class="table table-striped table-bordered">
            <thead>
              <tr class="tableheader">
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Idade</th>
                <th class="dt-center no-short">Editar</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
          
         </div>
      </div>
    </div>
  </div>
</section>

<div id="modal_donor" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h4 class="modal-title">Incluir Doador</h4>
      </div>

      <div class="modal-body">
        <form id="form_donor">

          <input id="donor_id" name="donor_id" hidden>
          
          <div class="form-group">
            <div class="col-lg-12">
            <label>Nome</label><input type="text" id="name" name="name" class="form-control" maxlength="100">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-12">
            <label>Email</label><input type="email"  id="email" name="email" class="form-control" maxlength="30">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-12">
            <label>CPF</label><input type="number" id="cpf" name="cpf" class="form-control" maxlength="100">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-12">
            <label>Telefone 1</label><input type="number" id="fone1" name="fone1" class="form-control" maxlength="100">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-12">
            <label>Telefone 2</label><input type="number" id="fone2" name="fone2" class="form-control" maxlength="100">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-12">
                <label>Data de Nascimento</label>
                <input type="date" id="date_birthday" name="date_birthday" class="form-control">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-12" class="form-control">
                <label>Intervalo de doação</label>
                <?php echo form_dropdown("interval_donation" , $interval_donation);?>
                <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-12">
            <label>Valor</label><input type="number" id="value" name="value" class="form-control" maxlength="100">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-12" class="form-control">
                <label>forma de pagamento</label>
                <?php echo form_dropdown("payment" , $payment);?>
                <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-12">
            <label>Endereço</label><input type="text" id="adress" name="adress" class="form-control" maxlength="100">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group text-center">
            <button type="submit" id="btn_save_donor" class="btn btn-primary">
              <i class="fa fa-save"></i>&nbsp;&nbsp;Incluir
            </button>
            <span class="help-block"></span>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>