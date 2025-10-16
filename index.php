<?php
    $pageTitle = 'Study Notes Optimizer';
    require __DIR__ . '/includes/header.php';
?>

    <div class="container">
        <header>
            <h1>📚 Study Notes Optimizer</h1>
            <p class="tagline">Transform your study materials for faster, smarter learning</p>
        </header>

        <div class="features-grid">
            <!-- Feature 1: Slide Shortener -->
            <div class="feature-card">
                <div class="feature-icon">✂️</div>
                <h2 class="feature-title">Slide Shortener</h2>
                <p class="feature-description">Upload your presentation slides and automatically condense the content for faster learning and revision.</p>
                
                <div class="upload-area" id="shortenerUpload" onclick="document.getElementById('shortenerFile').click()">
                    <div class="upload-icon">📤</div>
                    <p><strong>Click to upload</strong> or drag and drop</p>
                    <p style="font-size: 0.9em; color: #888; margin-top: 5px;">PPT, PPTX supported</p>
                </div>
                <input type="file" id="shortenerFile" accept=".ppt,.pptx" multiple>
                <div class="file-list" id="shortenerFiles"></div>

                <div class="options-panel">
                    <div class="option-group">
                        <label class="option-label">Compression Level</label>
                        <input type="range" id="compressionLevel" min="1" max="3" value="2" oninput="updateRangeValue(this)">
                        <span class="range-value">Medium</span>
                    </div>
                    <button class="btn process-btn" onclick="processShortener()">Shorten Slides</button>
                    <div class="status-message" id="shortenerStatus"></div>
                </div>
            </div>

            <!-- Feature 2: PDF to PPT -->
            <div class="feature-card">
                <div class="feature-icon">📄➡️📊</div>
                <h2 class="feature-title">PDF to PPT Converter</h2>
                <p class="feature-description">Convert your PDF notes into engaging PowerPoint presentations with smart content organization.</p>
                
                <div class="upload-area" id="pdfUpload" onclick="document.getElementById('pdfFile').click()">
                    <div class="upload-icon">📤</div>
                    <p><strong>Click to upload</strong> or drag and drop</p>
                    <p style="font-size: 0.9em; color: #888; margin-top: 5px;">PDF files only</p>
                </div>
                <input type="file" id="pdfFile" accept=".pdf" multiple>
                <div class="file-list" id="pdfFiles"></div>

                <div class="options-panel">
                    <div class="option-group">
                        <label class="option-label">Slide Style</label>
                        <select id="slideStyle">
                            <option value="minimal">Minimal</option>
                            <option value="modern" selected>Modern</option>
                            <option value="academic">Academic</option>
                            <option value="creative">Creative</option>
                        </select>
                    </div>
                    <button class="btn process-btn" onclick="processPdfToPpt()">Convert to PPT</button>
                    <div class="status-message" id="pdfStatus"></div>
                </div>
            </div>

            <!-- Feature 3: PPT Improver -->
            <div class="feature-card">
                <div class="feature-icon">🖼️✨</div>
                <h2 class="feature-title">PPT Image Enhancer</h2>
                <p class="feature-description">Upload images and automatically insert them into relevant slides based on filename matching.</p>
                
                <div class="upload-area" id="pptUpload" onclick="document.getElementById('pptFile').click()" style="margin-bottom: 15px;">
                    <div class="upload-icon">📤</div>
                    <p><strong>Upload PPT/PDF</strong></p>
                    <p style="font-size: 0.9em; color: #888; margin-top: 5px;">PPT, PPTX, PDF</p>
                </div>
                <input type="file" id="pptFile" accept=".ppt,.pptx,.pdf">
                <div class="file-list" id="pptFiles"></div>

                <div class="upload-area" id="imagesUpload" onclick="document.getElementById('imagesFile').click()">
                    <div class="upload-icon">🖼️</div>
                    <p><strong>Upload Images</strong></p>
                    <p style="font-size: 0.9em; color: #888; margin-top: 5px;">JPG, PNG, GIF (name files by topic)</p>
                </div>
                <input type="file" id="imagesFile" accept=".jpg,.jpeg,.png,.gif" multiple>
                <div class="file-list" id="imageFiles"></div>

                <div class="options-panel">
                    <div class="option-group">
                        <label class="option-label">Matching Sensitivity</label>
                        <select id="matchingSensitivity">
                            <option value="exact">Exact Match</option>
                            <option value="moderate" selected>Moderate</option>
                            <option value="flexible">Flexible</option>
                        </select>
                    </div>
                    <button class="btn process-btn" onclick="processPptImprover()">Enhance Presentation</button>
                    <div class="status-message" id="improverStatus"></div>
                </div>
            </div>
        </div>
    </div>

<?php
    require __DIR__ . '/includes/footer.php';
?>


