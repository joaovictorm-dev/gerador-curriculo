<?php
function esc($v){return htmlspecialchars(trim($v??''),ENT_QUOTES|ENT_SUBSTITUTE,'UTF-8');}
$nome=esc($_POST['nome']??'');
$data_nasc=esc($_POST['data_nascimento']??'');
$idade=esc($_POST['idade']??'');
$resumo=nl2br(esc($_POST['resumo']??''));
$skills=esc($_POST['skills']??'');
$exp_empresas=$_POST['exp_empresa']??[];
$exp_cargos=$_POST['exp_cargo']??[];
$exp_periodos=$_POST['exp_periodo']??[];
$exp_descs=$_POST['exp_desc']??[];
$edu_cursos=$_POST['edu_curso']??[];
$edu_insts=$_POST['edu_instituicao']??[];
$edu_anos=$_POST['edu_ano']??[];
$ref_nomes=$_POST['ref_nome']??[];
$ref_contatos=$_POST['ref_contato']??[];
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Currículo - <?= $nome ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{padding:20px;color:#222}
.cv-header{border-bottom:3px solid #0d6efd;padding-bottom:12px;margin-bottom:16px}
.section-title{color:#0d6efd;font-weight:600;margin-top:12px}
@media print{.no-print{display:none}}
</style>
</head>
<body>
<div class="container">
<div class="cv-header d-flex justify-content-between align-items-start">
<div>
<h1 class="h3"><?= esc($nome) ?></h1>
<div>Data de nascimento: <?= esc($data_nasc) ?> — Idade: <?= esc($idade) ?></div>
</div>
<div class="text-end">
<button class="btn btn-sm btn-primary no-print" onclick="window.print()">Imprimir / Salvar PDF</button>
</div>
</div>
<?php if($resumo): ?><div><strong class="section-title">Resumo / Objetivo</strong><p><?= $resumo ?></p></div><?php endif; ?>
<div>
<strong class="section-title">Experiências</strong>
<?php
$has=false;
for($i=0;$i<count($exp_empresas);$i++):
$empresa=esc($exp_empresas[$i]);
$cargo=esc($exp_cargos[$i]??'');
$periodo=esc($exp_periodos[$i]??'');
$desc=nl2br(esc($exp_descs[$i]??''));
if(!$empresa&&!$cargo&&!$periodo&&!$desc)continue;
$has=true;
?>
<div class="mb-2">
<div><strong><?= $cargo?:$empresa ?></strong> — <small><?= $empresa ?> <?= $periodo?"({$periodo})":'' ?></small></div>
<?php if($desc): ?><div class="small"><?= $desc ?></div><?php endif; ?>
</div>
<?php endfor; if(!$has)echo'<div class="text-muted">Nenhuma experiência informada.</div>'; ?>
</div>
<div>
<strong class="section-title">Formação</strong>
<?php
$has=false;
for($i=0;$i<count($edu_cursos);$i++):
$c=esc($edu_cursos[$i]);
$i2=esc($edu_insts[$i]??'');
$a=esc($edu_anos[$i]??'');
if(!$c&&!$i2&&!$a)continue;
$has=true;
?>
<div class="mb-2"><div><strong><?= $c ?></strong> — <?= $i2 ?> <?= $a?"({$a})":'' ?></div></div>
<?php endfor; if(!$has)echo'<div class="text-muted">Nenhuma formação informada.</div>'; ?>
</div>
<div>
<strong class="section-title">Habilidades</strong>
<p><?= nl2br(esc($skills))?:'<span class="text-muted">Nenhuma habilidade informada.</span>' ?></p>
</div>
<div>
<strong class="section-title">Referências</strong>
<?php
$has=false;
for($i=0;$i<count($ref_nomes);$i++):
$n=esc($ref_nomes[$i]);
$c=esc($ref_contatos[$i]??'');
if(!$n&&!$c)continue;
$has=true;
?>
<div class="mb-1"><?= $n ?> — <?= $c ?></div>
<?php endfor; if(!$has)echo'<div class="text-muted">Nenhuma referência informada.</div>'; ?>
</div>
<footer class="mt-4 small text-muted">Gerado pelo Gerador de Currículos - UNIPAR</footer>
</div>
</body>
</html>