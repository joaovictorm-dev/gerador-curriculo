$(function(){
  function calcIdade(data){
    if(!data)return '';
    const h=new Date();
    const p=data.split('-');
    if(p.length!==3)return '';
    const n=new Date(parseInt(p[0]),parseInt(p[1])-1,parseInt(p[2]));
    let i=h.getFullYear()-n.getFullYear();
    const m=h.getMonth()-n.getMonth();
    if(m<0||(m===0&&h.getDate()<n.getDate()))i--;
    return i;
  }
  $('#dob').on('change',function(){$('#idade').val(calcIdade($(this).val()));});
  function exp(){return $('<div class="exp-item row g-2 mb-2"><div class="col-md-5"><input name="exp_empresa[]" placeholder="Empresa" class="form-control"/></div><div class="col-md-4"><input name="exp_cargo[]" placeholder="Cargo" class="form-control"/></div><div class="col-md-2"><input name="exp_periodo[]" placeholder="Período" class="form-control"/></div><div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-exp">x</button></div><div class="col-12"><input name="exp_desc[]" placeholder="Descrição (opcional)" class="form-control mt-1"/></div></div>');}
  function edu(){return $('<div class="edu-item row g-2 mb-2"><div class="col-md-6"><input name="edu_curso[]" placeholder="Curso" class="form-control"/></div><div class="col-md-4"><input name="edu_instituicao[]" placeholder="Instituição" class="form-control"/></div><div class="col-md-2"><input name="edu_ano[]" placeholder="Ano" class="form-control"/></div><div class="col-12"><input name="edu_obs[]" placeholder="Observações (opcional)" class="form-control mt-1"/></div></div>');}
  function ref(){return $('<div class="ref-item row g-2 mb-2"><div class="col-md-5"><input name="ref_nome[]" placeholder="Nome" class="form-control"/></div><div class="col-md-5"><input name="ref_contato[]" placeholder="Contato" class="form-control"/></div><div class="col-md-2"><button type="button" class="btn btn-danger btn-sm remove-ref">x</button></div></div>');}
  $('#addExp').on('click',function(){$('#experiences').append(exp());});
  $('#addEdu').on('click',function(){$('#educations').append(edu());});
  $('#addRef').on('click',function(){$('#refs').append(ref());});
  $(document).on('click','.remove-exp',function(){$(this).closest('.exp-item').remove();});
  $(document).on('click','.remove-ref',function(){$(this).closest('.ref-item').remove();});
  $('#cvForm').on('submit',function(){$('#idade').val(calcIdade($('#dob').val()));});
});