#include "helpcommand.h"

HelpCommand::HelpCommand()
{
    
}

void HelpCommand::execute()
{
    cout << "--init     create template JSON file" << '\n';
    cout << "--help     view all commands" << '\n';
    cout << "--version  view version of program" << '\n';
}
