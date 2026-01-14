<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Athena Edu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/athena-edu/css/athena.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
</head>
<body class="athena-app">
    <aside class="athena-sidebar">
        <div class="athena-sidebar-header">
            <div class="athena-logo">
                <div class="athena-logo-icon">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <span>Athena Edu</span>
            </div>
        </div>
        <nav class="athena-nav">
            <div class="athena-nav-section">Principal</div>
            <a href="/athena" class="athena-nav-item active">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>
            <div class="athena-nav-section">Cadastros</div>
            <a href="/intranet/educar_aluno_lst.php" class="athena-nav-item">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                Alunos
            </a>
            <a href="/intranet/educar_servidor_lst.php" class="athena-nav-item">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Servidores
            </a>
            <a href="/intranet/educar_escola_lst.php" class="athena-nav-item">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                Escolas
            </a>
            <a href="/intranet/educar_turma_lst.php" class="athena-nav-item">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                Turmas
            </a>
            <div class="athena-nav-section">Movimentação</div>
            <a href="/intranet/educar_matricula_lst.php" class="athena-nav-item">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                Matrículas
            </a>
            <a href="/intranet/educar_falta_nota_aluno.php" class="athena-nav-item">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Faltas/Notas
            </a>
            <div class="athena-nav-section">Sistema</div>
            <a href="/intranet/logof.php" class="athena-nav-item">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Sair
            </a>
        </nav>
    </aside>
    <main class="athena-main">
        <header class="athena-header">
            <div class="athena-search">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color:var(--athena-gray)"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" placeholder="Buscar aluno, turma, escola...">
            </div>
            <div class="athena-header-actions">
                <button id="theme-toggle" class="athena-icon-btn" title="Alternar tema">
                    <svg id="theme-icon" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                </button>
                <button class="athena-icon-btn" title="Notificações">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span class="athena-badge">3</span>
                </button>
                <div style="display:flex;align-items:center;gap:0.75rem;padding-left:0.5rem;border-left:1px solid var(--athena-border)">
                    <div style="text-align:right">
                        <div style="font-weight:600;font-size:0.9rem">{{ $loggedUser->name ?? 'Administrador' }}</div>
                        <div style="font-size:0.75rem;color:var(--athena-text-muted)">{{ $loggedUser->role ?? 'Gestor' }}</div>
                    </div>
                    <img src="/intranet/imagens/user-default.png" alt="Avatar" class="athena-avatar" onerror="this.src='https://ui-avatars.com/api/?name=Admin&background=6366f1&color=fff'">
                </div>
            </div>
        </header>
        <div class="athena-content">
            <div style="margin-bottom:2rem">
                <h1 class="athena-page-title">Bem-vindo ao Athena Edu</h1>
                <p class="athena-page-subtitle">Visão geral da rede de ensino • {{ date('d/m/Y') }}</p>
            </div>
            <div class="athena-stats-grid">
                <div class="athena-stat-card">
                    <div class="athena-stat-header">
                        <div>
                            <div class="athena-stat-value" id="stat-alunos">1.847</div>
                            <div class="athena-stat-label">Alunos Matriculados</div>
                        </div>
                        <div class="athena-stat-icon primary">
                            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                    </div>
                    <div class="athena-stat-change positive">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        +5.2% este mês
                    </div>
                </div>
                <div class="athena-stat-card">
                    <div class="athena-stat-header">
                        <div>
                            <div class="athena-stat-value">142</div>
                            <div class="athena-stat-label">Professores Ativos</div>
                        </div>
                        <div class="athena-stat-icon success">
                            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                    </div>
                    <div class="athena-stat-change positive">+2 novos</div>
                </div>
                <div class="athena-stat-card">
                    <div class="athena-stat-header">
                        <div>
                            <div class="athena-stat-value">68</div>
                            <div class="athena-stat-label">Turmas Ativas</div>
                        </div>
                        <div class="athena-stat-icon info">
                            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        </div>
                    </div>
                    <div class="athena-stat-change positive">100% configuradas</div>
                </div>
                <div class="athena-stat-card">
                    <div class="athena-stat-header">
                        <div>
                            <div class="athena-stat-value">91%</div>
                            <div class="athena-stat-label">Frequência Média</div>
                        </div>
                        <div class="athena-stat-icon warning">
                            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                    </div>
                    <div class="athena-stat-change negative">-1.2% vs semana anterior</div>
                </div>
            </div>
            <div class="athena-grid-2" style="margin-bottom:2rem">
                <div class="athena-card">
                    <div class="athena-card-header">
                        <h3 class="athena-card-title">Evolução de Matrículas</h3>
                    </div>
                    <div class="athena-card-body">
                        <div class="athena-chart-container"><canvas id="enrollmentChart"></canvas></div>
                    </div>
                </div>
                <div class="athena-card">
                    <div class="athena-card-header">
                        <h3 class="athena-card-title">Frequência Semanal</h3>
                    </div>
                    <div class="athena-card-body">
                        <div class="athena-chart-container"><canvas id="attendanceChart"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="athena-card">
                <div class="athena-card-header">
                    <h3 class="athena-card-title">Ações Rápidas</h3>
                </div>
                <div class="athena-card-body">
                    <div class="athena-quick-actions">
                        <a href="/intranet/educar_aluno_cad.php" class="athena-quick-action">
                            <div class="athena-quick-action-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                            </div>
                            <span>Novo Aluno</span>
                        </a>
                        <a href="/intranet/educar_matricula_cad.php" class="athena-quick-action">
                            <div class="athena-quick-action-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <span>Nova Matrícula</span>
                        </a>
                        <a href="/intranet/educar_falta_nota_aluno.php" class="athena-quick-action">
                            <div class="athena-quick-action-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </div>
                            <span>Lançar Notas</span>
                        </a>
                        <a href="/intranet/educar_relatorio_alunos.php" class="athena-quick-action">
                            <div class="athena-quick-action-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <span>Relatórios</span>
                        </a>
                    </div>
                </div>
            </div>
            <footer style="text-align:center;padding:2rem 0;color:var(--athena-text-muted);font-size:0.85rem">
                <p><strong>Athena Edu</strong> - Sistema de Gestão Educacional</p>
                <p>Desenvolvido por Atenza Digital • Versão 1.0.0</p>
            </footer>
        </div>
    </main>
    <script src="/athena-edu/js/athena.js"></script>
</body>
</html>
