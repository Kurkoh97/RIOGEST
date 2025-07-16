<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

function getInitials($name) {
    $words = explode(' ', $name);
    $initials = '';
    foreach ($words as $w) {
        if (isset($w[0])) $initials .= strtoupper($w[0]);
    }
    return substr($initials, 0, 2);
}
$nombreUsuario = $_SESSION['usuario'];
$avatar = getInitials($nombreUsuario);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIOGEST - Denuncias Ciudadanas</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
    <header class="header">
        <div class="logo">RIOGEST</div>
        <nav class="nav-menu">
            <a href="#" class="nav-item active" onclick="showSection('feed')">Inicio</a>
            <a href="#" class="nav-item" onclick="showSection('my-pqrs')">Mis PQRs</a>
            <a href="#" class="nav-item" onclick="showSection('news')">Noticias</a>
            <a href="#" class="nav-item" onclick="showSection('admin')" id="admin-nav" style="display: none;">Admin</a>
        </nav> 
        <div class="profile-dropdown">
            <div class="profile-toggle" onclick="toggleProfileMenu()">
                <div class="profile-avatar"><?php echo $avatar; ?></div>
                <div class="profile-info">
                    <div class="profile-name"><?php echo htmlspecialchars($nombreUsuario); ?></div>
                    <div class="profile-status">En línea</div>
                </div>
                <span class="toggle-icon" id="toggleIcon">▼</span>
            </div>
            <div class="dropdown-menu" id="profileMenu">
                <a href="#" onclick="showSection('profile')"><i class="menu-icon">👤</i> Mi Perfil</a>
                <a href="#" onclick="showSection('config')"><i class="menu-icon">⚙️</i> Configuración</a>
                <a href="#" onclick="showSection('dashboard')"><i class="menu-icon">📊</i> Dashboard</a>
                <a href="#" onclick="showSection('messages')"><i class="menu-icon">💬</i> Mensajes</a>
                <a href="Logout.php"><i class="menu-icon">🚪</i> Cerrar Sesión</a>
            </div>
        </div>
    </header>
        
            <!-- Main Content -->
        <div class="main-content" id="main-app">
            
            <!-- Left Sidebar -->
            <aside class="sidebar">
                <h3>Menú</h3>
                <div class="menu-item active" onclick="showSection('feed')"><span>🏠</span> Inicio</div>
                <div class="menu-item" onclick="showSection('my-pqrs')"><span>📋</span> Mis PQRs</div>
                <div class="menu-item" onclick="showSection('saved')"><span>🔖</span> Guardados</div>
                <div class="menu-item" onclick="showSection('following')"><span>👥</span> Siguiendo</div>
                <div class="menu-item" onclick="showSection('categories')"><span>📂</span> Categorías</div>
                <div class="menu-item" onclick="showSection('news')"><span>📰</span> Noticias</div>
                <div class="menu-item" onclick="showSection('help')"><span>❓</span> Ayuda</div>
            </aside>
                    
            <!-- Feed -->
            <main class="feed">
                <div class="post-creator">
                    <textarea class="post-input" placeholder="¿Qué situación quieres reportar o denunciar?"></textarea>
                    <div class="post-options">
                        <div class="post-option" onclick="addImage()"><span>📷</span> Foto</div>
                        <div class="post-option" onclick="addLocation()"><span>📍</span> Ubicación</div>
                        <div class="post-option" onclick="addTag()"><span>🏷️</span> Etiqueta</div>
                        <div class="post-option" onclick="selectCategory()"><span>📂</span> Categoría</div>
                    </div>
                    <button class="post-btn" onclick="createPost()">Publicar PQR</button>
                </div>

                <!-- Posts Feed (Demo) -->
                <div class="posts-container" id="posts-container">
                    <!-- Aquí se renderizan los posts con JS o puedes dejar los de ejemplo -->
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

        <!-- Admin Panel (solo visible si es admin, controlado por JS) -->
        <div class="admin-panel" id="admin-panel" style="display: none;">
            <h2>Panel de Administración</h2>
            <div class="admin-stats">
                <div class="stat-card"><div class="stat-number">156</div><div class="stat-label">PQRs Activos</div></div>
                <div class="stat-card"><div class="stat-number">89</div><div class="stat-label">Resueltos este mes</div></div>
                <div class="stat-card"><div class="stat-number">23</div><div class="stat-label">Pendientes</div></div>
                <div class="stat-card"><div class="stat-number">1,245</div><div class="stat-label">Usuarios registrados</div></div>
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
                    <!-- Aquí puedes renderizar PQRs pendientes con JS si lo deseas -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para acciones rápidas -->
    <div class="modal" id="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="modal-body"></div>
        </div>
    </div>

    <script>
    // Solo lógica de la app, NO login/logout
    let posts = [
        {
            author: "María Camila Rodriguez",
            avatar: "MC",
            time: "Hace 2 horas",
            status: "Recibido",
            category: "Servicios Públicos",
            content: "Llevo 3 días sin servicio de agua en el barrio El Porvenir. La comunidad está muy afectada y necesitamos una solución urgente. Las familias con niños pequeños son las más perjudicadas.",
            location: "Carrera 15 #45-30, Barrio El Porvenir",
            likes: 24,
            supports: 15,
            follows: 8,
            comments: [
                { avatar: "SA", author: "Sara Arango", text: "La infraestructura cerca a la casa de la convencion presenta riesgo de derrumbe y riesgo de lesion a ciudadanos." },
                { avatar: "CF", author: "Carlos Fernández", text: "Ya reporté el caso a la empresa de acueducto. Están trabajando en la reparación." }
            ]
        },
        // ...puedes agregar más posts de ejemplo aquí...
    ];

    function renderPosts() {
        const container = document.getElementById('posts-container');
        container.innerHTML = '';
        posts.forEach(post => {
            let commentsHtml = '';
            if (post.comments) {
                post.comments.forEach(c => {
                    commentsHtml += `
                        <div class="comment">
                            <div class="comment-avatar">${c.avatar}</div>
                            <div class="comment-content">
                                <div class="comment-author">${c.author}</div>
                                <div class="comment-text">${c.text}</div>
                            </div>
                        </div>
                    `;
                });
            }
            container.innerHTML += `
                <div class="post">
                    <div class="post-header">
                        <div class="post-avatar">${post.avatar}</div>
                        <div class="post-info">
                            <h4>${post.author}</h4>
                            <div class="post-meta">
                                <span>${post.time}</span>
                                <span class="status-badge status-received">${post.status}</span>
                            </div>
                        </div>
                    </div>
                    <div class="post-category">${post.category}</div>
                    <div class="post-content">
                        <p>${post.content}</p>
                        <p><strong>Ubicación:</strong> ${post.location}</p>
                    </div>
                    <div class="post-actions">
                        <button class="action-btn" onclick="toggleReaction(this, 'like')"><span>👍</span> <span class="count">${post.likes}</span></button>
                        <button class="action-btn" onclick="toggleReaction(this, 'support')"><span>🤝</span> <span class="count">${post.supports}</span></button>
                        <button class="action-btn" onclick="toggleReaction(this, 'follow')"><span>👁️</span> <span class="count">${post.follows}</span></button>
                        <button class="action-btn" onclick="toggleComments(this)"><span>💬</span> <span class="count">${post.comments ? post.comments.length : 0}</span></button>
                        <button class="action-btn" onclick="sharePost(this)"><span>📤</span> Compartir</button>
                    </div>
                    <div class="comments-section" style="display: none;">
                        ${commentsHtml}
                        <input type="text" class="comment-input" placeholder="Escribe un comentario...">
                    </div>
                </div>
            `;
        });
    }

    function createPost() {
        const content = document.querySelector('.post-input').value;
        if (!content.trim()) {
            showNotification('Escribe el contenido de tu PQR', 'error');
            return;
        }
        posts.unshift({
            author: "<?php echo htmlspecialchars($nombreUsuario); ?>",
            avatar: "<?php echo $avatar; ?>",
            time: "Ahora",
            status: "Recibido",
            category: "General",
            content: content,
            location: "Sin ubicación",
            likes: 0,
            supports: 0,
            follows: 0,
            comments: []
        });
        document.querySelector('.post-input').value = '';
        showNotification('PQR publicado exitosamente', 'success');
        renderPosts();
    }

    function toggleReaction(button, type) {
        button.classList.toggle('active');
        const countSpan = button.querySelector('.count');
        let count = parseInt(countSpan.textContent);
        if (button.classList.contains('active')) count++;
        else count--;
        countSpan.textContent = count;
    }

    function toggleComments(button) {
        const post = button.closest('.post');
        const commentsSection = post.querySelector('.comments-section');
        commentsSection.style.display = commentsSection.style.display === 'none' ? 'block' : 'none';
    }

    function sharePost(button) {
        showNotification('Enlace copiado al portapapeles', 'success');
    }

    function addImage() { showNotification('Funcionalidad de imagen próximamente', 'info'); }
    function addLocation() { showNotification('Funcionalidad de ubicación próximamente', 'info'); }
    function addTag() { showNotification('Funcionalidad de etiquetas próximamente', 'info'); }
    function selectCategory() { showNotification('Funcionalidad de categorías próximamente', 'info'); }

    // Admin panel logic (solo muestra si es admin, puedes mejorar esto con PHP si tienes roles)
    function showSection(section) {
        document.querySelectorAll('.nav-item').forEach(item => item.classList.remove('active'));
        if (section === 'admin') {
            document.getElementById('main-app').style.display = 'none';
            document.getElementById('admin-panel').style.display = 'block';
        } else {
            document.getElementById('main-app').style.display = 'grid';
            document.getElementById('admin-panel').style.display = 'none';
        }
    }

    // Modal y notificaciones
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
        setTimeout(() => { notification.remove(); }, 3000);
    }
    window.onclick = function(event) {
        const modal = document.getElementById('modal');
        if (event.target === modal) closeModal();
    }
    // Animación para notificaciones
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    `;
    document.head.appendChild(style);

    // Renderiza los posts al cargar
    document.addEventListener('DOMContentLoaded', renderPosts);
    </script>
        <script>
        function toggleProfileMenu() {
            const menu = document.getElementById('profileMenu');
            const toggleIcon = document.getElementById('toggleIcon');
            
            menu.classList.toggle('show');
            toggleIcon.classList.toggle('active');
        }

        // Cerrar al hacer clic fuera
        document.addEventListener('click', function(e) {
            const dropdown = document.querySelector('.profile-dropdown');
            const menu = document.getElementById('profileMenu');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (!dropdown.contains(e.target) && menu.classList.contains('show')) {
                menu.classList.remove('show');
                toggleIcon.classList.remove('active');
            }
        });
    </script>

</body>
</html>