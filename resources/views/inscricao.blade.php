<!doctype html>
<html>
    <head>
 	 	<input onclick="tipo('reintegracao')" 			type="radio" name="tipoInscricao" > Reintegração <br>
	 	<input onclick="tipo('transferenciaInterna')"  type="radio" name="tipoInscricao" > Transferencia Interna <br>
	 	<input onclick="tipo('transferenciaExterna')"  type="radio" name="tipoInscricao" > Transferencia Externa <br>
	 	<input onclick="tipo('portadorDeDiploma')" 		type="radio" name="tipoInscricao" > Portador de Diploma <br>
    </head>
    <body>
	  
    
    

    
	 	<div id="reintegracao"         style="display: none;">2.1.1. REINTEGRAÇÃO – Reingresso do ex-aluno da UFRPE, que se evadiu do seu Curso de Graduação. Uma vez deferida, vinculará o aluno ao regime e currículo atualmente vigentes no seu curso. Somente serão apreciados os requerimentos de Reintegração de ex-alunos que se enquadrem nas seguintes situações:
<p>
a. O aluno só pode ser reintegrado ao seu curso e Unidade (SEDE, UAG, UAST e UAEADTec) de origem, bem como ao turno ao qual estava vinculado;
<p>
b. Não tiver sido desligado de um Curso da UFRPE, exceto o requerente que tenha cumprido com aprovação no mínimo 90% da carga horária total de seu curso (excluída deste total a carga horária referente à disciplina Estágio Curricular Obrigatório, Monografia ou Trabalho de Conclusão de Curso), que em um semestre de vínculo possa integralizar o curso, neste caso poderá solicitar a apreciação de sua situação e que esteja com Estágio Curricular Obrigatório, Monografia ou Trabalho de Conclusão de Curso pronto para a defesa atendendo Resolução 354/2008;
<p>
c. Não tiver pedido desistência da sua vaga. No caso do aluno ter desistido da sua vaga no curso, ele não poderá ser reintegrado;
<p>
d. Dispuser de tempo para integralização do currículo pleno do Curso de Graduação, dentro do prazo máximo estabelecido pelo CNE e UFRPE, considerando, para tanto, o prazo anterior de vínculo ativo e mais os semestres que o mesmo deveria utilizar para concluir o curso;
<p>
e. Não ter decorrido, no intervalo de afastamento, o tempo máximo de integralização do Curso;
<p>
f. Não tiver 04 (quatro) reprovações em uma mesma disciplina;
<p>
g. Maior proximidade de conclusão do curso;
<p>
h. Maior média global constante no Histórico Escolar da graduação;
<p>
documentação exigida: 
<p>
		<form action = "cadastroInscricao" method = "POST" enctype = "multipart/form-data">
      {{ csrf_field() }}
      	1 - Histórico escolar (UFRPE) atualizado, solicitado ao DRCA/UFRPE (cópia).
         <input type = "file" name = "historicoEscolar" />
         <input type="hidden" name="tipo" value="reintegracao" />
         <input type="hidden" name="editalId" value="1" />
         <p> Curso: 
    	   <select name="curso">
  				<option value="Letras">Letras</option>
  				<option value="BCC">BCC</option>
			</select>
    	<p> Unidade:
    		<select name="unidade">
  				<option value="Sede">Sede</option>
  				<option value="UAEADtec">UAEADtec</option>
  				<option value="UAG">UAG</option>
  				<option value="UAST">UAST</option>
			</select>
    	<p> Turno:
    		<select name="turno">
  				<option value="Manhã">Manhã</option>
  				<option value="Tarde">Tarde</option>
  				<option value="Noite">Noite</option>
  				<option value="Especial (EAD)">Especial (EAD)</option>
			</select>
      <p> Polo (apenas para cursos UAEAD tec)
      <input type="text" name="polo" />
    	<p> Dados pessoais
    	<p> Dados da Instituição
    	
    	<p> Curso de Origem:
    	<input type="text" name="cursoDeOrigem" />
    	<p> Instituição de origem:
    	<input type="text" name="instituicaoDeOrigem" />
    	<p> natureza da ies:
    	<input type="text" name="naturezaDaIes" />
    	<p> endereço completo da ies: Nº: UF: Bairro: cidade:
    	<input type="text" name="enderecoIes" />
    	<p> 
         <input type = "submit"/>
      </form>
		</div>	
		 
		<div id="transferenciaInterna" style="display: none;">2.1.2. TRANSFERÊNCIA INTERNA (REOPÇÃO) – Transferência interna de alunos da UFRPE (SEDE- UAG-UAST) de uma Unidade Acadêmica para outra, para o mesmo curso ou curso afim. A Reopção, uma vez deferida, vinculará o aluno ao regime e currículo vigentes no Curso de Graduação, sendo-lhe dado o prazo de dois semestres letivos consecutivos para a adequação ao currículo pleno (para os cursos regidos pelo sistema seriado). Somente serão apreciados os requerimentos de Reopção de alunos da UFRPE que se enquadrem nas seguintes situações:
<p>
a. Tiver cursado no mínimo 40% do currículo original do seu Curso de Graduação;
<p>
b. Tiver cursado com aprovação, no máximo 70% do curso;
<p>
c. Tiver ingressado na Universidade através de Vestibular ou SISU;
<p>
d. Não tiver 04 (quatro) reprovações em uma mesma disciplina;
<p>
e. Conseguir integralizar o currículo pleno do novo Curso de Graduação, dentro do prazo máximo estabelecido pelo CNE e UFRPE para o curso no qual está ingressando, considerando o prazo anterior, já utilizado no curso original;
<p>
f. Menor número de disciplinas a cursar para os candidatos aos cursos regidos pelo sistema seriado, necessários para integralização do curso pretendido;
<p>
g. Maior média nas disciplinas cursadas que serão aproveitadas para a integralização do curso pretendido;
<p>
h. Maior coeficiente de rendimento acadêmico.
<p>

		<form action = "cadastroInscricao" method = "POST" enctype = "multipart/form-data">
      {{ csrf_field() }}
      	1 - Declaração de vínculo atualizado com o Curso da UFRPE (cópia);
         <input type="file" name="declaracaoDeVinculo"/>
         <p>2 - Histórico escolar (Ensino Superior) atualizado, com indicativo da média global, solicitado ao DRCA/UFRPE (cópia);
         <input type="file" name="historicoEscolar" />
         <p>
         <input type="hidden" name="tipo" value="transferenciaInterna" />
         <input type="hidden" name="editalId" value="1" />
         <p> Curso: 
    	   <select name="curso">
  				<option value="Letras">Letras</option>
  				<option value="BCC">BCC</option>
			</select>
    	<p> Unidade:
    		<select name="unidade">
  				<option value="Sede">Sede</option>
  				<option value="UAEADtec">UAEADtec</option>
  				<option value="UAG">UAG</option>
  				<option value="UAST">UAST</option>
			</select>
    	<p> Turno:
    		<select name="turno">
  				<option value="Manhã">Manhã</option>
  				<option value="Tarde">Tarde</option>
  				<option value="Noite">Noite</option>
  				<option value="Especial (EAD)">Especial (EAD)</option>
			</select>
      <p> Polo (apenas para cursos UAEAD tec)
      <input type="text" name="polo" />
    	<p> Dados pessoais
    	<p> Dados da Instituição
    	
    	<p> Curso de Origem:
    	<input type="text" name="cursoDeOrigem" />
    	<p> Instituição de origem:
    	<input type="text" name="instituicaoDeOrigem" />
    	<p> natureza da ies:
    	<input type="text" name="naturezaDaIes" />
    	<p> endereço completo da ies: Nº: UF: Bairro: cidade:
    	<input type="text" name="enderecoIes" />
    	<p> 
         <input type = "submit"/>
      </form>
		</div>
		<div id="transferenciaExterna" style="display: none;">2.1.3. TRANSFERÊNCIA EXTERNA – ingresso de alunos de outras instituições de Ensino Superior, para continuidade do mesmo Curso de Graduação plena ao qual estava vinculado ou para ingresso em um Curso considerado afim, devidamente reconhecido como tal pelo CEPE/UFRPE (vide relação anexa). Só serão apreciados os requerimentos de Transferência de alunos de outras IES, oriundos de Cursos de Graduação autorizados ou reconhecidos pelo CNE. A transferência, uma vez deferida, vinculará o aluno ao regime e currículo vigentes no Curso de Graduação, sendo-lhe dado o prazo de dois semestres letivos consecutivos para a adequação ao currículo pleno (para os cursos regidos pelo sistema seriado). Somente serão apreciados os requerimentos de candidatos que se enquadrem nas seguintes situações:
<p>
a. Tiver cursado e concluído com aproveitamento de média global igual ou maior que 6,0 e não ter mais do que 2 (duas) reprovações nas disciplinas do primeiro semestre letivo na Instituição de origem;
<p>
b. Conseguir concluir o currículo pleno do Curso de Graduação da UFRPE, dentro do prazo máximo estabelecido pelo UFRPE para o curso no qual está ingressando, considerando o prazo anterior utilizado no curso da IES original;
<p>
c. Tiver cursado com aprovação, no máximo 70% do curso na Instituição de origem;
<p>
d. Não tiver sido reprovado 04 (quatro) vezes em uma ou mais disciplinas;
<p>  
e. Não tiver sido formalmente desligado de um Curso de Graduação da UFRPE.
<p>

		<form action = "cadastroInscricao" method = "POST" enctype = "multipart/form-data">
      {{ csrf_field() }}
      	1 - Declaração de vínculo com a IES de origem, com data atualizada, informando matrícula em disciplinas ou trancamento do semestre letivo em curso (cópia);
         <input type="file" name="declaracaoDeVinculo"/>
         <p>2 - Histórico escolar (Ensino Superior) atualizado, com indicativo da média global , oficial da IFES de origem.
         <input type="file" name="historicoEscolar" />
			<p>3 - Programa das disciplinas cursadas que podem ser aproveitadas no novo curso (cópias com carimbo e assinatura da instituição de origem). O número mínimo para deferimento nesse item é de 02 (dois) Programas, no entanto, a quantidade de disciplinas que possam ser dispensadas no curso (comprovadas a partir dos Programas apresentados) servirá como critério de desempate, no caso de haver empate entre candidatos. No caso de candidato oriundo da UFRPE, não é necessário anexar o Programa das Disciplinas, Portaria de Reconhecimento do Curso ou Autorização para funcionamento;         
         <input type="file" name="programaDasDisciplinas" />
			<p>4 - Documento acadêmico que contenha o Currículo pleno do curso original, caso o Histórico escolar não demonstre (cópia).         
         <input type="file" name="curriculo" />
			<p>         
			<input type="hidden" name="tipo" value="transferenciaExterna" />
			<input type="hidden" name="editalId" value="1" />
			<p> Curso: 
    	   <select name="curso">
  				<option value="Letras">Letras</option>
  				<option value="BCC">BCC</option>
			</select>
    	<p> Unidade:
    		<select name="unidade">
  				<option value="Sede">Sede</option>
  				<option value="UAEADtec">UAEADtec</option>
  				<option value="UAG">UAG</option>
  				<option value="UAST">UAST</option>
			</select>
    	<p> Turno:
    		<select name="turno">
  				<option value="Manhã">Manhã</option>
  				<option value="Tarde">Tarde</option>
  				<option value="Noite">Noite</option>
  				<option value="Especial (EAD)">Especial (EAD)</option>
			</select>
      <p> Polo (apenas para cursos UAEAD tec)
      <input type="text" name="polo" />
    	<p> Dados pessoais
    	<p> Dados da Instituição
    	
    	<p> Curso de Origem:
    	<input type="text" name="cursoDeOrigem" />
    	<p> Instituição de origem:
    	<input type="text" name="instituicaoDeOrigem" />
    	<p> natureza da ies:
    	<input type="text" name="naturezaDaIes" />
    	<p> endereço completo da ies: Nº: UF: Bairro: cidade:
    	<input type="text" name="enderecoIes" />
    	<p> 
         <input type = "submit"/>
      </form>
		</div>
		<div id="portadorDeDiploma"	 style="display: none;">2.1.4. PORTADOR DE DIPLOMA – ingresso de Diplomados.
<p>  
a. Somente serão apreciados os requerimentos de ingresso graduados, que sejam oriundos de Cursos de Graduação afim do pretendido, reconhecidos pelo CNE.
<p>  
b. Não tiver sido formalmente desligado de um Curso de Graduação da UFRPE para o curso o qual pleiteia o ingresso.
<p>  
c. Tiver cursado e concluído com aproveitamento de média global igual ou maior que 6,0.
<p>  
d. Nota no Exame Nacional do Ensino Médio a partir da edição de 2010.
<p>

		<form action = "cadastroInscricao" method = "POST" enctype = "multipart/form-data">
      {{ csrf_field() }}
      	1 - Diploma de Curso de Graduação pleno ou certificado de conclusão de curso reconhecido pelo CNE, neste último caso, anexar documento de que deu entrada na expedição do Diploma (cópia);
         <input type="file" name="declaracaoDeVinculo"/>
         <p>2 - Histórico escolar do Curso superior completo, com indicativo da média global (cópia);
         <input type="file" name="historicoEscolar" />
         <p>3 - Programa das disciplinas cursadas que podem ser aproveitadas no novo curso ( cópias). O número mínimo para deferimento nesse item é de 02 (dois) Programas, no entanto, a quantidade de disciplinas que possam ser dispensadas no curso (comprovadas a partir dos Programas apresentados) servirá como critério de desempate, no caso de haver empate entre candidatos. No caso de candidato oriundo da UFRPE, não é necessário anexar o Programa das Disciplinas; 
         <input type="file" name="programaDasDisciplinas" />
         <p>4 - Como critério complementar, a nota no Exame Nacional do Ensino Médio (ENEM) a partir da edição de 2010.
         <input type="file" name="enem" />
         <input type="hidden" name="tipo" value="portadorDeDiploma" />
         <input type="hidden" name="editalId" value="1" />
         <p> Curso: 
    	   <select name="curso">
  				<option value="Letras">Letras</option>
  				<option value="BCC">BCC</option>
			</select>
    	<p> Unidade:
    		<select name="unidade">
  				<option value="Sede">Sede</option>
  				<option value="UAEADtec">UAEADtec</option>
  				<option value="UAG">UAG</option>
  				<option value="UAST">UAST</option>
			</select>
    	<p> Turno:
    		<select name="turno">
  				<option value="Manhã">Manhã</option>
  				<option value="Tarde">Tarde</option>
  				<option value="Noite">Noite</option>
  				<option value="Especial (EAD)">Especial (EAD)</option>
			</select>
      <p> Polo (apenas para cursos UAEAD tec)
      <input type="text" name="polo" />
    	<p> Dados pessoais
    	<p> Dados da Instituição
    	
    	<p> Curso de Origem:
    	<input type="text" name="cursoDeOrigem" />
    	<p> Instituição de origem:
    	<input type="text" name="instituicaoDeOrigem" />
    	<p> natureza da ies:
    	<input type="text" name="naturezaDaIes" />
    	<p> endereço completo da ies: Nº: UF: Bairro: cidade:
    	<input type="text" name="enderecoIes" />
    	<p> 
         <p>
         <input type = "submit"/>
      </form>
		</div>
  

    	</div>	
    </body>
    <script type="text/javascript" >
    function tipo(x) {    
    	if (x == "reintegracao") {
       document.getElementById("reintegracao").style.display = "";
       document.getElementById("transferenciaInterna").style.display = "none";
       document.getElementById("transferenciaExterna").style.display = "none";
       document.getElementById("portadorDeDiploma").style.display = "none";
    	}
    	if (x == "transferenciaInterna") {
       document.getElementById("reintegracao").style.display = "none";
       document.getElementById("transferenciaInterna").style.display = "";
       document.getElementById("transferenciaExterna").style.display = "none";
       document.getElementById("portadorDeDiploma").style.display = "none";
    	}
    	if (x == "transferenciaExterna") {
       document.getElementById("reintegracao").style.display = "none";
       document.getElementById("transferenciaInterna").style.display = "none";
       document.getElementById("transferenciaExterna").style.display = "";
       document.getElementById("portadorDeDiploma").style.display = "none";
    	}
    	if (x == "portadorDeDiploma") {
       document.getElementById("reintegracao").style.display = "none";
       document.getElementById("transferenciaInterna").style.display = "none";
       document.getElementById("transferenciaExterna").style.display = "none";
       document.getElementById("portadorDeDiploma").style.display = "";
    	}
    }
    
    
    </script>
</html>
