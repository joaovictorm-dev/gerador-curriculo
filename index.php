<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Gerador de Currículo - UNIPAR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">Gerador de Currículo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navmenu" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#form-section">Formulário</a></li>
        <li class="nav-item"><a class="nav-link" href="#help">Instruções</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <h1 class="h3 mb-3">Preencha seus dados</h1>
  <form id="cvForm" action="generate.php" method="post" target="_blank">
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Nome completo</label>
        <input name="nome" required class="form-control" />
      </div>
      <div class="col-md-3">
        <label class="form-label">Data de nascimento</label>
        <input id="dob" name="data_nascimento" type="date" required class="form-control" />
      </div>
      <div class="col-md-3">
        <label class="form-label">Idade</label>
        <input id="idade" name="idade" readonly class="form-control" />
      </div>

      <div class="col-12">
        <label class="form-label">Resumo/Objetivo</label>
        <textarea name="resumo" rows="3" class="form-control"></textarea>
      </div>

      <div class="col-12">
        <h5>Experiências profissionais <button id="addExp" type="button" class="btn btn-sm btn-outline-primary ms-2">＋</button></h5>
        <div id="experiences">
          <div class="exp-item row g-2 mb-2">
            <div class="col-md-5"><input name="exp_empresa[]" placeholder="Empresa" class="form-control" /></div>
            <div class="col-md-4"><input name="exp_cargo[]" placeholder="Cargo" class="form-control" /></div>
            <div class="col-md-2"><input name="exp_periodo[]" placeholder="Período" class="form-control" /></div>
            <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-exp">x</button></div>
            <div class="col-12"><input name="exp_desc[]" placeholder="Descrição (opcional)" class="form-control mt-1" /></div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <h5>Formação acadêmica <button id="addEdu" type="button" class="btn btn-sm btn-outline-primary ms-2">＋</button></h5>
        <div id="educations">
          <div class="edu-item row g-2 mb-2">
            <div class="col-md-6"><input name="edu_curso[]" placeholder="Curso" class="form-control" /></div>
            <div class="col-md-4"><input name="edu_instituicao[]" placeholder="Instituição" class="form-control" /></div>
            <div class="col-md-2"><input name="edu_ano[]" placeholder="Ano" class="form-control" /></div>
            <div class="col-12"><input name="edu_obs[]" placeholder="Observações (opcional)" class="form-control mt-1" /></div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <h5>Referências pessoais <button id="addRef" type="button" class="btn btn-sm btn-outline-primary ms-2">＋</button></h5>
        <div id="refs">
          <div class="ref-item row g-2 mb-2">
            <div class="col-md-5"><input name="ref_nome[]" placeholder="Nome" class="form-control" /></div>
            <div class="col-md-5"><input name="ref_contato[]" placeholder="Contato" class="form-control" /></div>
            <div class="col-md-2"><button type="button" class="btn btn-danger btn-sm remove-ref">x</button></div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <label class="form-label">Habilidades (separe por vírgula)</label>
        <input name="skills" class="form-control" placeholder="Ex: PHP, HTML, CSS, JavaScript" />
      </div>

      <div class="col-12 d-flex gap-2">
        <button type="submit" class="btn btn-success">Gerar Currículo (abrir/Imprimir)</button>
        <button type="reset" class="btn btn-secondary">Limpar</button>
      </div>
    </div>
  </form>

  <hr class="my-4" id="help">
  <h4>Instruções rápidas</h4>
  <ul>
    <li>Para adicionar múltiplas experiências, formações ou referências, clique no botão “＋”.</li>
    <li>O botão “Gerar Currículo” abre o currículo com opção de imprimir/salvar PDF.</li>
  </ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>