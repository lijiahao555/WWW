from django.db import models

# Create your Model here.

class Demo(models.Model):
    name = models.CharField(max_length=20)