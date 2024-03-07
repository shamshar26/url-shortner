@extends('layouts.app')

@section('content')
<div class="container">
        <h1 class="text-center">Linkify</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="shorten.php" method="POST">
                    <div class="mb-3">
                        <label for="originalURL" class="form-label">Enter URL to Shortener</label>
                        <input type="url" class="form-control" id="originalURL" name="originalURL" required>
                    </div>
                    <button type="submit" class="btn btn-primary justify-content">Shorten URL</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <!-- Display shortened URL here -->
                <?php if(isset($shortenedURL)): ?>
                    <div class="alert alert-success" role="alert">
                        Shortened URL: <a href="<?php echo $shortenedURL; ?>"><?php echo $shortenedURL; ?></a>
                    </div>
                <?php endif; ?>
                <!-- Display error message here -->
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
@endsection
