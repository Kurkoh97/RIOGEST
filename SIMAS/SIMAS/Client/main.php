<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIOGEST- Denuncias Ciudadanas</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <div class="logo">
                RIOGEST
            </div>
            <nav class="nav-menu">
                <a href="#" class="nav-item active" onclick="showSection('feed')">Inicio</a>
                <a href="#" class="nav-item" onclick="showSection('my-pqrs')">Mis PQRs</a>
                <a href="#" class="nav-item" onclick="showSection('news')">Noticias</a>
                <a href="#" class="nav-item" onclick="showSection('admin')" id="admin-nav" style="display: none;">Admin</a>
            </nav>
            <div class="user-profile" onclick="toggleUserMenu()">
                <div class="user-avatar">DH</div>
                <span>Duvan Henao</span>
            </div>
        </header>

        <!-- Main Content -->
        <div class="main-content" id="main-app">
            <!-- Left Sidebar -->
            <aside class="sidebar">
                <h3>Menú</h3>
                <div class="menu-item active" onclick="showSection('feed')">
                    <span>🏠</span> Inicio
                </div>
                <div class="menu-item" onclick="showSection('my-pqrs')">
                    <span>📋</span> Mis PQRs
                </div>
                <div class="menu-item" onclick="showSection('saved')">
                    <span>🔖</span> Guardados
                </div>
                <div class="menu-item" onclick="showSection('following')">
                    <span>👥</span> Siguiendo
                </div>
                <div class="menu-item" onclick="showSection('categories')">
                    <span>📂</span> Categorías
                </div>
                <div class="menu-item" onclick="showSection('news')">
                    <span>📰</span> Noticias
                </div>
                <div class="menu-item" onclick="showSection('help')">
                    <span>❓</span> Ayuda
                </div>
            </aside>

            <!-- Feed -->
            <main class="feed">
                <div class="post-creator">
                    <textarea class="post-input" placeholder="¿Qué situación quieres reportar o denunciar?"></textarea>
                    <div class="post-options">
                        <div class="post-option" onclick="addImage()">
                            <span>📷</span> Foto
                        </div>
                        <div class="post-option" onclick="addLocation()">
                            <span>📍</span> Ubicación
                        </div>
                        <div class="post-option" onclick="addTag()">
                            <span>🏷️</span> Etiqueta
                        </div>
                        <div class="post-option" onclick="selectCategory()">
                            <span>📂</span> Categoría
                        </div>
                    </div>
                    <div class="visibility-toggle">
                        
                    </div>
                    <button class="post-btn" onclick="createPost()">Publicar PQR</button>
                </div>

                <!-- Posts Feed -->
                <div class="posts-container">
                    <div class="post">
                        <div class="post-header">
                            <div class="post-avatar">MC</div>
                            <div class="post-info">
                                <h4>María Camila Rodriguez</h4>
                                <div class="post-meta">
                                    <span>Hace 2 horas</span>
                                    <span class="status-badge status-received">Recibido</span>
                                </div>
                            </div>
                        </div>
                        <div class="post-category">Servicios Públicos</div>
                        <div class="post-content">
                            <p>Llevo 3 días sin servicio de agua en el barrio El Porvenir. La comunidad está muy afectada y necesitamos una solución urgente. Las familias con niños pequeños son las más perjudicadas.</p>
                            <p><strong>Ubicación:</strong> Carrera 15 #45-30, Barrio El Porvenir</p>
                        </div>
                        <div class="post-actions">
                            <button class="action-btn" onclick="toggleReaction(this, 'like')">
                                <span>👍</span> <span class="count">24</span>
                            </button>
                            <button class="action-btn" onclick="toggleReaction(this, 'support')">
                                <span>🤝</span> <span class="count">15</span>
                            </button>
                            <button class="action-btn" onclick="toggleReaction(this, 'follow')">
                                <span>👁️</span> <span class="count">8</span>
                            </button>
                            <button class="action-btn" onclick="toggleComments(this)">
                                <span>💬</span> <span class="count">6</span>
                            </button>
                            <button class="action-btn" onclick="sharePost(this)">
                                <span>📤</span> Compartir
                            </button>
                        </div>
                        <div class="comments-section" style="display: none;">
                            <div class="comment">
                                <div class="comment-avatar">SA</div>
                                <div class="comment-content">
                                    <div class="comment-author">Sara Arango</div>
                                    <div class="comment-text">La infraestructura cerca a la casa de la convencion presenta riesgo de derrumbe y riesgo de lesion a ciudadanos.</div>
                                </div>
                            </div>
                            <div class="comment">
                                <div class="comment-avatar">CF</div>
                                <div class="comment-content">
                                    <div class="comment-author">Carlos Fernández</div>
                                    <div class="comment-text">Ya reporté el caso a la empresa de acueducto. Están trabajando en la reparación.</div>
                                </div>
                            </div>
                            <input type="text" class="comment-input" placeholder="Escribe un comentario...">
                        </div>
                    </div>

                    <div class="post">
                        <div class="post-header">
                            <div class="post-avatar">JR</div>
                            <div class="post-info">
                                <h4>José Rodríguez</h4>
                                <div class="post-meta">
                                    <span>Hace 1 día</span>
                                    <span class="status-badge status-review">En Revisión</span>
                                </div>
                            </div>
                        </div>
                        <div class="post-category">Seguridad</div>
                        <div class="post-content">
                            <p>Denuncio el mal estado de las luminarias en el parque central. Está muy oscuro en las noches y representa un riesgo para la seguridad de los ciudadanos que transitan por la zona.</p>
                            <p><strong>Ubicación:</strong> Parque Central, Calle 20 con Carrera 10</p>
                        </div>
                        <div class="post-actions">
                            <button class="action-btn" onclick="toggleReaction(this, 'like')">
                                <span>👍</span> <span class="count">31</span>
                            </button>
                            <button class="action-btn" onclick="toggleReaction(this, 'support')">
                                <span>🤝</span> <span class="count">18</span>
                            </button>
                            <button class="action-btn" onclick="toggleReaction(this, 'follow')">
                                <span>👁️</span> <span class="count">12</span>
                            </button>
                            <button class="action-btn" onclick="toggleComments(this)">
                                <span>💬</span> <span class="count">4</span>
                            </button>
                            <button class="action-btn" onclick="sharePost(this)">
                                <span>📤</span> Compartir
                            </button>
                        </div>
                        <div class="comments-section" style="display: none;">
                            <div class="comment">
                                <div class="comment-avatar">LP</div>
                                <div class="comment-content">
                                    <div class="comment-author">Laura Pérez</div>
                                    <div class="comment-text">Totalmente de acuerdo. Ayer casi me roban por esa zona por la oscuridad.</div>
                                </div>
                            </div>
                            <input type="text" class="comment-input" placeholder="Escribe un comentario...">
                        </div>
                    </div>

                    <div class="post">
                        <div class="post-header">
                            <div class="post-avatar">ST</div>
                            <div class="post-info">
                                <h4>Sandra Torres</h4>
                                <div class="post-meta">
                                    <span>Hace 3 días</span>
                                    <span class="status-badge status-resolved">Resuelto</span>
                                </div>
                            </div>
                        </div>
                        <div class="post-category">Vías y Transporte</div>
                        <div class="post-content">
                            <p>Gracias por la rápida respuesta! Ya repararon el hueco en la Avenida Principal que había reportado. Excelente trabajo del equipo de mantenimiento vial.</p>
                            <p><strong>Ubicación:</strong> Avenida Principal con Calle 8</p>
                        </div>
                        <div class="post-actions">
                            <button class="action-btn active" onclick="toggleReaction(this, 'like')">
                                <span>👍</span> <span class="count">45</span>
                            </button>
                            <button class="action-btn" onclick="toggleReaction(this, 'support')">
                                <span>🤝</span> <span class="count">22</span>
                            </button>
                            <button class="action-btn" onclick="toggleReaction(this, 'follow')">
                                <span>👁️</span> <span class="count">5</span>
                            </button>
                            <button class="action-btn" onclick="toggleComments(this)">
                                <span>💬</span> <span class="count">8</span>
                            </button>
                            <button class="action-btn" onclick="sharePost(this)">
                                <span>📤</span> Compartir
                            </button>
                        </div>
                        <div class="comments-section" style="display: none;">
                            <div class="comment">
                                <div class="comment-avatar">AM</div>
                                <div class="comment-content">
                                    <div class="comment-author">Alcaldía Municipal</div>
                                    <div class="comment-text">Nos complace saber que quedó satisfecha con la reparación. Seguimos trabajando por nuestra ciudad.</div>
                                </div>
                            </div>
                            <input type="text" class="comment-input" placeholder="Escribe un comentario...">
                        </div>
                    </div>
                </div>
            </main>

            <!-- Right Panel -->
            <aside class="right-panel">
                <h3>Tendencias</h3>
                <div class="trending-item">
                    <div class="trending-icon">🚰</div>
                    <div class="trending-info">
                        <h5>Servicios Públicos</h5>
                        <p>45 reportes esta semana</p>
                    </div>
                </div>
                <div class="trending-item">
                    <div class="trending-icon">🚦</div>
                    <div class="trending-info">
                        <h5>Vías y Transporte</h5>
                        <p>32 reportes esta semana</p>
                    </div>
                </div>
                <div class="trending-item">
                    <div class="trending-icon">🏥</div>
                    <div class="trending-info">
                        <h5>Salud</h5>
                        <p>18 reportes esta semana</p>
                    </div>
                </div>
                <div class="trending-item">
                    <div class="trending-icon">🌳</div>
                    <div class="trending-info">
                        <h5>Medio Ambiente</h5>
                        <p>25 reportes esta semana</p>
                    </div>
                </div>

                <h3 style="margin-top: 30px;">Noticias Oficiales</h3>
                <div class="trending-item">
                    <div class="trending-icon">📰</div>
                    <div class="trending-info">
                        <h5>Nuevo plan de pavimentación</h5>
                        <p>Inicia próximo mes</p>
                    </div>
                </div>
                <div class="trending-item">
                    <div class="trending-icon">🏛️</div>
                    <div class="trending-info">
                        <h5>Horarios de atención</h5>
                        <p>Actualizados</p>
                    </div>
                </div>
            </aside>
        </div>

        <!-- Login Form -->
        <div class="auth-form" id="login-form" style="display: none;">
            <h2>Iniciar Sesión</h2>
            <form onsubmit="login(event)">
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" required>
                </div>
                <button type="submit" class="form-btn">Iniciar Sesión</button>
            </form>
            <div class="form-switch">
                ¿No tienes cuenta? <a href="#" onclick="showRegister()">Regístrate</a>
            </div>
        </div>

        <!-- Register Form -->
        <div class="auth-form" id="register-form" style="display: none;">
            <h2>Crear Cuenta</h2>
            <form onsubmit="register(event)">
                <div class="form-group">
                    <label for="fullName">Nombre Completo</label>
                    <input type="text" id="fullName" required>
                </div>
                <div class="form-group">
                    <label for="regEmail">Correo Electrónico</label>
                    <input type="email" id="regEmail" required>
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="tel" id="phone" required>
                </div>
                <div class="form-group">
                    <label for="document">Documento de Identidad</label>
                    <input type="text" id="document" required>
                </div>
                <div class="form-group">
                    <label for="regPassword">Contraseña</label>
                    <input type="password" id="regPassword" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirmar Contraseña</label>
                    <input type="password" id="confirmPassword" required>
                </div>
                <button type="submit" class="form-btn">Crear Cuenta</button>
            </form>
            <div class="form-switch">
                ¿Ya tienes cuenta? <a href="#" onclick="showLogin()">Iniciar Sesión</a>
            </div>
        </div>

        <!-- Admin Panel -->
        <div class="admin-panel" id="admin-panel" style="display: none;">
            <h2>Panel de Administración</h2>
            
            <div class="admin-stats">
                <div class="stat-card">
                    <div class="stat-number">156</div>
                    <div class="stat-label">PQRs Activos</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">89</div>
                    <div class="stat-label">Resueltos este mes</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">23</div>
                    <div class="stat-label">Pendientes</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">1,245</div>
                    <div class="stat-label">Usuarios registrados</div>
                </div>
            </div>

            <div class="admin-actions">
                <button class="admin-btn" onclick="moderateContent()">Moderar Contenido</button>
                <button class="admin-btn" onclick="manageUsers()">Gestionar Usuarios</button>
                <button class="admin-btn" onclick="generateReports()">Generar Reportes</button>
                <button class="admin-btn" onclick="postNews()">Publicar Noticias</button>
                <button class="admin-btn danger" onclick="emergencyAlert()">Alerta Emergencia</button>
            </div>

            <div class="admin-content">
                <h3>PQRs Pendientes de Revisión</h3>
                <div class="posts-container">
                    <div class="post">
                        <div class="post-header">
                            <div class="post-avatar">RC</div>
                            <div class="post-info">
                                <h4>Roberto Campos</h4>
                                <div class="post-meta">
                                    <span>Hace 30 min</span>
                                    <span class="status-badge status-received">Pendiente</span>
                                </div>
                            </div>
                        </div>
                        <div class="post-category">Medio Ambiente</div>
                        <div class="post-content">
                            <p>Hay acumulación de basura en la quebrada del sector norte. Esto puede causar problemas ambientales y de salud pública.</p>
                        </div>
                        <div class="admin-actions">
                            <button class="admin-btn" onclick="approvePost(this)">Aprobar</button>
                            <button class="admin-btn" onclick="assignPost(this)">Asignar</button>
                            <button class="admin-btn" onclick="respondPost(this)">Responder</button>
                            <button class="admin-btn danger" onclick="rejectPost(this)">Rechazar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="modal-body"></div>
        </div>
    </div>

    <script>
        // App State
        let currentUser = {
            name: 'Juan Díaz',
            email: 'juan.diaz@email.com',
            avatar: 'JD',
            isAdmin: false
        };

        let posts = [];
        let currentVisibility = 'public';
        let isLoggedIn = true;

        // Initialize App
        document.addEventListener('DOMContentLoaded', function() {
            if (isLoggedIn) {
                showMainApp();
            } else {
                showLogin();
            }
        });

        // Authentication Functions
        function login(event) {
            event.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Simulate login
            if (email && password) {
                isLoggedIn = true;
                if (email === 'admin@ciudad.gov.co') {
                    currentUser.isAdmin = true;
                    document.getElementById('admin-nav').style.display = 'block';
                }
                showMainApp();
                showNotification('Sesión iniciada correctamente', 'success');
            }
        }

        function register(event) {
            event.preventDefault();
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('regEmail').value;
            const password = document.getElementById('regPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password !== confirmPassword) {
                showNotification('Las contraseñas no coinciden', 'error');
                return;
            }
            
            // Simulate registration
            if (fullName && email && password) {
                currentUser.name = fullName;
                currentUser.email = email;
                isLoggedIn = true;
                showMainApp();
                showNotification('Cuenta creada exitosamente. Verifica tu correo.', 'success');
            }
        }

        function showLogin() {
            document.getElementById('main-app').style.display = 'none';
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('register-form').style.display = 'none';
            document.getElementById('admin-panel').style.display = 'none';
        }

        function showRegister() {
            document.getElementById('main-app').style.display = 'none';
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';
            document.getElementById('admin-panel').style.display = 'none';
        }

        function showMainApp() {
            document.getElementById('main-app').style.display = 'grid';
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'none';
            document.getElementById('admin-panel').style.display = 'none';
        }

        // Navigation Functions
        function showSection(section) {
            // Update active nav item
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('active');
            });
            document.querySelectorAll('.menu-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Show appropriate section
            switch(section) {
                case 'feed':
                    showMainApp();
                    break;
                case 'admin':
                    if (currentUser.isAdmin) {
                        document.getElementById('main-app').style.display = 'none';
                        document.getElementById('admin-panel').style.display = 'block';
                    }
                    break;
                case 'my-pqrs':
                    showMyPQRs();
                    break;
                case 'news':
                    showNews();
                    break;
                default:
                    showMainApp();
            }
        }

        // Post Functions
        function createPost() {
            const content = document.querySelector('.post-input').value;
            if (!content.trim()) {
                showNotification('Escribe el contenido de tu PQR', 'error');
                return;
            }
            
            const post = {
                id: Date.now(),
                author: currentUser.name,
                avatar: currentUser.avatar,
                content: content,
                timestamp: 'Ahora',
                status: 'received',
                category: 'General',
                visibility: currentVisibility,
                likes: 0,
                supports: 0,
                follows: 0,
                comments: []
            };
            
            posts.unshift(post);
            document.querySelector('.post-input').value = '';
            showNotification('PQR publicado exitosamente', 'success');
            renderPosts();
        }

        function renderPosts() {
            const container = document.querySelector('.posts-container');
            // Posts are already rendered in HTML for demo
            // In a real app, this would dynamically create post elements
        }

        function toggleReaction(button, type) {
            button.classList.toggle('active');
            const countSpan = button.querySelector('.count');
            let count = parseInt(countSpan.textContent);
            
            if (button.classList.contains('active')) {
                count++;
            } else {
                count--;
            }
            
            countSpan.textContent = count;
        }

        function toggleComments(button) {
            const post = button.closest('.post');
            const commentsSection = post.querySelector('.comments-section');
            
            if (commentsSection.style.display === 'none') {
                commentsSection.style.display = 'block';
            } else {
                commentsSection.style.display = 'none';
            }
        }

        function sharePost(button) {
            showNotification('Enlace copiado al portapapeles', 'success');
        }

        function toggleVisibility(type) {
            currentVisibility = type;
            document.querySelectorAll('.toggle-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
        }

        // Post Creation Options
        function addImage() {
            showNotification('Funcionalidad de imagen próximamente', 'info');
        }

        function addLocation() {
            showNotification('Funcionalidad de ubicación próximamente', 'info');
        }

        function addTag() {
            showNotification('Funcionalidad de etiquetas próximamente', 'info');
        }

        function selectCategory() {
            showModal(`
                <h3>Seleccionar Categoría</h3>
                <div style="margin-top: 20px;">
                    <div class="menu-item" onclick="selectCat('Servicios Públicos')">🚰 Servicios Públicos</div>
                    <div class="menu-item" onclick="selectCat('Vías y Transporte')">🚦 Vías y Transporte</div>
                    <div class="menu-item" onclick="selectCat('Seguridad')">🔒 Seguridad</div>
                    <div class="menu-item" onclick="selectCat('Salud')">🏥 Salud</div>
                    <div class="menu-item" onclick="selectCat('Medio Ambiente')">🌳 Medio Ambiente</div>
                    <div class="menu-item" onclick="selectCat('Educación')">📚 Educación</div>
                </div>
            `);
        }

        function selectCat(category) {
            showNotification(`Categoría seleccionada: ${category}`, 'success');
            closeModal();
        }

        // Admin Functions
        function moderateContent() {
            showNotification('Abriendo panel de moderación', 'info');
        }

        function manageUsers() {
            showNotification('Abriendo gestión de usuarios', 'info');
        }

        function generateReports() {
            showNotification('Generando reportes estadísticos', 'info');
        }

        function postNews() {
            showModal(`
                <h3>Publicar Noticia Oficial</h3>
                <div style="margin-top: 20px;">
                    <textarea placeholder="Contenido de la noticia..." style="width: 100%; height: 100px; margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 10px;"></textarea>
                    <button class="admin-btn" onclick="publishNews()">Publicar</button>
                </div>
            `);
        }

        function publishNews() {
            showNotification('Noticia publicada exitosamente', 'success');
            closeModal();
        }

        function emergencyAlert() {
            showModal(`
                <h3>Alerta de Emergencia</h3>
                <div style="margin-top: 20px; color: #e74c3c;">
                    <p>⚠️ Esta función enviará una alerta a todos los usuarios registrados</p>
                    <textarea placeholder="Mensaje de emergencia..." style="width: 100%; height: 80px; margin: 15px 0; padding: 10px; border: 2px solid #e74c3c; border-radius: 10px;"></textarea>
                    <button class="admin-btn danger" onclick="sendEmergencyAlert()">Enviar Alerta</button>
                </div>
            `);
        }

        function sendEmergencyAlert() {
            showNotification('Alerta de emergencia enviada', 'success');
            closeModal();
        }

        function approvePost(button) {
            const post = button.closest('.post');
            const statusBadge = post.querySelector('.status-badge');
            statusBadge.textContent = 'Aprobado';
            statusBadge.className = 'status-badge status-review';
            showNotification('PQR aprobado', 'success');
        }

        function assignPost(button) {
            showModal(`
                <h3>Asignar PQR</h3>
                <div style="margin-top: 20px;">
                    <select style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 5px;">
                        <option>Departamento de Obras Públicas</option>
                        <option>Departamento de Servicios</option>
                        <option>Departamento de Seguridad</option>
                        <option>Departamento de Salud</option>
                    </select>
                    <button class="admin-btn" onclick="assignToAdmin()">Asignar</button>
                </div>
            `);
        }

        function assignToAdmin() {
            showNotification('PQR asignado exitosamente', 'success');
            closeModal();
        }

        function respondPost(button) {
            showModal(`
                <h3>Responder PQR</h3>
                <div style="margin-top: 20px;">
                    <textarea placeholder="Respuesta oficial..." style="width: 100%; height: 120px; margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 10px;"></textarea>
                    <button class="admin-btn" onclick="sendResponse()">Enviar Respuesta</button>
                </div>
            `);
        }

        function sendResponse() {
            showNotification('Respuesta enviada exitosamente', 'success');
            closeModal();
        }

        function rejectPost(button) {
            if (confirm('¿Estás seguro de que quieres rechazar este PQR?')) {
                const post = button.closest('.post');
                post.style.opacity = '0.5';
                showNotification('PQR rechazado', 'error');
            }
        }

        // Other Functions
        function showMyPQRs() {
            showNotification('Mostrando tus PQRs', 'info');
        }

        function showNews() {
            showNotification('Mostrando noticias oficiales', 'info');
        }

        function toggleUserMenu() {
            showModal(`
                <h3>Perfil de Usuario</h3>
                <div style="margin-top: 20px;">
                    <div style="text-align: center; margin-bottom: 20px;">
                        <div style="width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(45deg, #FF6B6B, #4ECDC4); margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; font-weight: bold;">${currentUser.avatar}</div>
                        <h4>${currentUser.name}</h4>
                        <p style="color: #666;">${currentUser.email}</p>
                    </div>
                    <div class="menu-item" onclick="editProfile()">✏️ Editar Perfil</div>
                    <div class="menu-item" onclick="changePassword()">🔒 Cambiar Contraseña</div>
                    <div class="menu-item" onclick="notifications()">🔔 Notificaciones</div>
                    <div class="menu-item" onclick="logout()">🚪 Cerrar Sesión</div>
                </div>
            `);
        }

        function editProfile() {
            showNotification('Funcionalidad de edición próximamente', 'info');
            closeModal();
        }

        function changePassword() {
            showNotification('Funcionalidad de cambio de contraseña próximamente', 'info');
            closeModal();
        }

        function notifications() {
            showNotification('Funcionalidad de notificaciones próximamente', 'info');
            closeModal();
        }

        function logout() {
            isLoggedIn = false;
            currentUser.isAdmin = false;
            document.getElementById('admin-nav').style.display = 'none';
            showLogin();
            closeModal();
            showNotification('Sesión cerrada', 'info');
        }

        // Utility Functions
        function showModal(content) {
            document.getElementById('modal-body').innerHTML = content;
            document.getElementById('modal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 15px 20px;
                border-radius: 10px;
                color: white;
                font-weight: 600;
                z-index: 10000;
                animation: slideIn 0.3s ease-out;
            `;
            
            const colors = {
                success: '#42b883',
                error: '#e74c3c',
                info: '#4267B2',
                warning: '#f39c12'
            };
            
            notification.style.background = colors[type] || colors.info;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('modal');
            if (event.target === modal) {
                closeModal();
            }
        }

        // Add keyframe animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>