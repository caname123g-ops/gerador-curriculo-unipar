<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preencha seus dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-section {
            padding: 50px 0;
        }
        .section-title {
            color: #333;
            border-bottom: 2px solid #667eea;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Menu de Navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Gerador de Currículos</a>
            <div class="navbar-nav">
                <a class="nav-link" href="index.php">Início</a>
                <a class="nav-link active" href="formulario.php">Formulário</a>
                <a class="nav-link" href="#">Visualizar</a>
            </div>
        </div>
    </nav>

    <div class="container form-section">
        <h1 class="text-center mb-5">PREENCHA SEUS DADOS</h1>
        
        <form action="curriculo.php" method="POST">
            <!-- Dados Pessoais -->
            <div class="mb-4">
                <h2 class="section-title">DADOS PESSOAIS</h2>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nome completo</label>
                        <input type="text" class="form-control" name="nome" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" name="nascimento" id="nascimento" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Idade (automática)</label>
                        <input type="text" class="form-control" id="idade" readonly>
                        <input type="hidden" name="idade" id="idade_hidden">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Telefone</label>
                        <input type="tel" class="form-control" name="telefone" required>
                    </div>
                </div>
            </div>

            <!-- Formação Acadêmica -->
            <div class="mb-4">
                <h2 class="section-title">FORMAÇÃO ACADÊMICA</h2>
                <div id="formacao-container">
                    <div class="row formacao-item">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Instituição</label>
                            <input type="text" class="form-control" name="instituicao[]">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Curso</label>
                            <input type="text" class="form-control" name="curso[]">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Período</label>
                            <input type="text" class="form-control" name="periodo_formacao[]">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-success" onclick="adicionarFormacao()">+ Adicionar Formação</button>
            </div>

            <!-- Experiências Profissionais -->
            <div class="mb-4">
                <h2 class="section-title">EXPERIÊNCIAS PROFISSIONAIS</h2>
                <div id="experiencia-container">
                    <div class="row experiencia-item">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Empresa</label>
                            <input type="text" class="form-control" name="empresa[]">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Cargo</label>
                            <input type="text" class="form-control" name="cargo[]">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Período</label>
                            <input type="text" class="form-control" name="periodo_experiencia[]">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Descrição</label>
                            <input type="text" class="form-control" name="descricao[]">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-success" onclick="adicionarExperiencia()">+ Adicionar Experiência</button>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Gerar Currículo</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Calcular idade automaticamente
        document.getElementById('nascimento').addEventListener('change', function() {
            const nascimento = new Date(this.value);
            const hoje = new Date();
            let idade = hoje.getFullYear() - nascimento.getFullYear();
            const mes = hoje.getMonth() - nascimento.getMonth();
            
            if (mes < 0 || (mes === 0 && hoje.getDate() < nascimento.getDate())) {
                idade--;
            }
            
            document.getElementById('idade').value = idade + ' anos';
            document.getElementById('idade_hidden').value = idade;
        });

        // Adicionar campos de formação
        function adicionarFormacao() {
            const container = document.getElementById('formacao-container');
            const novoItem = document.createElement('div');
            novoItem.className = 'row formacao-item mt-3';
            novoItem.innerHTML = `
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="instituicao[]" placeholder="Instituição">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="curso[]" placeholder="Curso">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="periodo_formacao[]" placeholder="Período">
                </div>
            `;
            container.appendChild(novoItem);
        }

        // Adicionar campos de experiência
        function adicionarExperiencia() {
            const container = document.getElementById('experiencia-container');
            const novoItem = document.createElement('div');
            novoItem.className = 'row experiencia-item mt-3';
            novoItem.innerHTML = `
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" name="empresa[]" placeholder="Empresa">
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" name="cargo[]" placeholder="Cargo">
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" name="periodo_experiencia[]" placeholder="Período">
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" name="descricao[]" placeholder="Descrição">
                </div>
            `;
            container.appendChild(novoItem);
        }
    </script>
</body>
</html>