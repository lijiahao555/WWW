from django.db import models

# Create your Model here.
# Model.py

class User(models.Model):
    name = models.CharField(max_length=20)