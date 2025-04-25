<div class="dashboard-container">
    <div class="dashboard-header">
        <h1><i class="fas fa-window-restore"></i> Manage Popup Templates</h1>
        <p>Create and manage your website popup notifications</p>
    </div>

    <div class="dashboard-content">
        <!-- Form Section -->
        <div class="form-section">
            <div class="form-card">
                <h2><i class="fas fa-<?php echo isset($popup) ? 'edit' : 'plus'; ?>"></i> <?php echo isset($popup) ? 'Edit Popup' : 'Create New Popup'; ?></h2>
                
                <form action="<?php echo isset($popup) ? '/admin/update/' . $popup['id'] : '/admin/store'; ?>" method="post" class="popup-form">
                    <div class="form-group">
                        <label for="title">Popup Title</label>
                        <input type="text" name="title" id="title" 
                               value="<?php echo isset($popup['title']) ? htmlspecialchars($popup['title']) : ''; ?>" 
                               placeholder="Enter popup title" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Popup Content</label>
                        <div class="code-editor-header">
                            <span>HTML/CSS/JS Editor</span>
                            <button type="button" class="preview-btn" id="preview-popup">
                                <i class="fas fa-eye"></i> Preview
                            </button>
                        </div>
                        <textarea name="message" id="message" rows="10" required><?php 
                            echo isset($popup['message']) ? htmlspecialchars($popup['message']) : ''; 
                        ?></textarea>
                    </div>

                    <div class="form-group switch-group">
                        <label class="switch">
                            <input type="checkbox" name="is_active" 
                                   <?php echo (isset($popup['is_active']) && $popup['is_active'] == 1) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                        <span class="switch-label">Enabled</span>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-<?php echo isset($popup) ? 'save' : 'plus-circle'; ?>"></i> 
                            <?php echo isset($popup) ? 'Update Popup' : 'Create Popup'; ?>
                        </button>
                        <?php if(isset($popup)): ?>
                            <a href="/admin/popups" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <!-- Popup List Section -->
        <div class="list-section">
            <div class="list-card">
                <div class="list-header">
                    <h2><i class="fas fa-list"></i> Existing Popups</h2>
                    <div class="search-box">
                        <input type="text" placeholder="Search popups..." id="popup-search">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="popups-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($popups)): ?>
                                <?php foreach ($popups as $p): ?>
                                    <tr>
                                        <td><?php echo $p['id']; ?></td>
                                        <td><?php echo htmlspecialchars($p['title']); ?></td>
                                        <td>
                                            <span class="status-badge <?php echo $p['is_active'] ? 'active' : 'inactive'; ?>">
                                                <?php echo $p['is_active'] ? 'Active' : 'Inactive'; ?>
                                            </span>
                                        </td>
                                        <td class="actions">
                                            <a href="/admin/edit/<?php echo $p['id']; ?>" class="btn-action edit" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="/admin/delete/<?php echo $p['id']; ?>" class="btn-action delete" title="Delete" onclick="return confirm('Are you sure you want to delete this popup?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            <a href="#" class="btn-action preview" title="Preview" data-content="<?php echo htmlspecialchars($p['message']); ?>">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="no-data">
                                        <i class="fas fa-info-circle"></i> No popups found
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div id="preview-modal" class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h3>Popup Preview</h3>
        <div id="preview-content"></div>
    </div>
</div>

<style>
    :root {
        --primary: #4361ee;
        --primary-light: #eef2ff;
        --secondary: #6c757d;
        --success: #2ecc71;
        --danger: #e74c3c;
        --warning: #f39c12;
        --info: #3498db;
        --light: #f8f9fa;
        --dark: #343a40;
        --border: #e0e0e0;
        --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        --radius: 8px;
        --transition: all 0.3s ease;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 20px;
    }

    .dashboard-header {
        margin-bottom: 30px;
    }

    .dashboard-header h1 {
        color: var(--dark);
        font-size: 28px;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 5px;
    }

    .dashboard-header p {
        color: var(--secondary);
        font-size: 14px;
    }

    .dashboard-content {
        display: flex;
        gap: 20px;
    }

    .form-section, .list-section {
        flex: 1;
    }

    .form-card, .list-card {
        background: white;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        padding: 25px;
        margin-bottom: 20px;
    }

    .form-card h2, .list-card h2 {
        font-size: 20px;
        color: var(--dark);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: var(--dark);
        font-size: 14px;
    }

    .form-group input[type="text"],
    .form-group textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--border);
        border-radius: var(--radius);
        font-size: 14px;
        transition: var(--transition);
    }

    .form-group input[type="text"]:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    }

    .form-group textarea {
        min-height: 200px;
        resize: vertical;
        font-family: 'Courier New', Courier, monospace;
        font-size: 13px;
        background: #f8f9fa;
        padding: 15px;
    }

    .code-editor-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .code-editor-header span {
        font-size: 12px;
        color: var(--secondary);
        font-weight: 500;
    }

    .preview-btn {
        background: var(--light);
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 5px 10px;
        font-size: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: var(--transition);
    }

    .preview-btn:hover {
        background: var(--primary-light);
    }

    .switch-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: var(--success);
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }

    .switch-label {
        font-size: 14px;
        color: var(--dark);
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .btn {
        padding: 10px 20px;
        border-radius: var(--radius);
        border: none;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }

    .btn-primary {
        background: var(--primary);
        color: white;
    }

    .btn-primary:hover {
        background: #3a56d4;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: var(--light);
        color: var(--secondary);
        border: 1px solid var(--border);
    }

    .btn-secondary:hover {
        background: #e9ecef;
    }

    .list-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .search-box {
        position: relative;
        width: 250px;
    }

    .search-box input {
        width: 100%;
        padding: 8px 15px 8px 35px;
        border: 1px solid var(--border);
        border-radius: var(--radius);
        font-size: 14px;
    }

    .search-box i {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--secondary);
        font-size: 14px;
    }

    .popups-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    .popups-table th {
        text-align: left;
        padding: 12px 15px;
        background: var(--primary-light);
        color: var(--primary);
        font-weight: 500;
    }

    .popups-table td {
        padding: 12px 15px;
        border-bottom: 1px solid var(--border);
        vertical-align: middle;
    }

    .popups-table tr:hover {
        background: var(--light);
    }

    .status-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-badge.active {
        background: #e3f7eb;
        color: var(--success);
    }

    .status-badge.inactive {
        background: #f5e8e8;
        color: var(--danger);
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .btn-action {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
        color: white;
        text-decoration: none;
    }

    .btn-action.edit {
        background: var(--info);
    }

    .btn-action.delete {
        background: var(--danger);
    }

    .btn-action.preview {
        background: var(--warning);
    }

    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow);
    }

    .no-data {
        text-align: center;
        padding: 30px;
        color: var(--secondary);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    .no-data i {
        font-size: 24px;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
    }

    .modal-content {
        background-color: white;
        margin: 5% auto;
        padding: 25px;
        border-radius: var(--radius);
        width: 80%;
        max-width: 700px;
        max-height: 80vh;
        overflow-y: auto;
        position: relative;
    }

    .close-modal {
        position: absolute;
        right: 20px;
        top: 20px;
        font-size: 24px;
        cursor: pointer;
        color: var(--secondary);
    }

    #preview-content {
        margin-top: 20px;
        border: 1px solid var(--border);
        padding: 20px;
        min-height: 200px;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .dashboard-content {
            flex-direction: column;
        }
    }

    @media (max-width: 768px) {
        .list-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .search-box {
            width: 100%;
        }
        
        .popups-table {
            display: block;
            overflow-x: auto;
        }
    }
</style>

<script>
// Preview functionality
document.addEventListener('DOMContentLoaded', function() {
    // Form preview
    const previewBtn = document.getElementById('preview-popup');
    if (previewBtn) {
        previewBtn.addEventListener('click', function() {
            const content = document.getElementById('message').value;
            document.getElementById('preview-content').innerHTML = content;
            document.getElementById('preview-modal').style.display = 'block';
        });
    }
    
    // Row preview buttons
    const previewButtons = document.querySelectorAll('.btn-action.preview');
    previewButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const content = this.getAttribute('data-content');
            document.getElementById('preview-content').innerHTML = content;
            document.getElementById('preview-modal').style.display = 'block';
        });
    });
    
    // Close modal
    const closeModal = document.querySelector('.close-modal');
    if (closeModal) {
        closeModal.addEventListener('click', function() {
            document.getElementById('preview-modal').style.display = 'none';
        });
    }
    
    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('preview-modal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
    
    // Search functionality
    const searchInput = document.getElementById('popup-search');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('.popups-table tbody tr');
            
            rows.forEach(row => {
                const title = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                if (title.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
});
</script>

<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">