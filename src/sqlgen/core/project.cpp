#include "project.h"

Project::Project()
{

}

QJsonDocument Project::document()
{
    return this->project_document;
}

void Project::setDocument(QJsonDocument document)
{
    this->project_document = document;
}

QJsonValue Project::getSection(QString section)
{
    return this->project_document.object().value(section);
}
