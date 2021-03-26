/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.view.filters;

import eg.edu.tanta.view.base.UserManager;
import java.io.IOException;
import javax.faces.application.ResourceHandler;
import javax.inject.Inject;
import javax.servlet.Filter;
import javax.servlet.FilterChain;
import javax.servlet.FilterConfig;
import javax.servlet.ServletException;
import javax.servlet.ServletRequest;
import javax.servlet.ServletResponse;
import javax.servlet.annotation.WebFilter;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Salma
 */
@WebFilter("/*")
public class SecurityFilter implements Filter {

    @Inject
    private UserManager userManager;

    @Override
    public void init(FilterConfig filterConfig) throws ServletException {
        //throw new UnsupportedOperationException("Not supported yet.");
    }

    @Override
    public void doFilter(ServletRequest req, ServletResponse res, FilterChain chain) throws ServletException, IOException {
        HttpServletRequest request = (HttpServletRequest) req;
        HttpServletResponse response = (HttpServletResponse) res;
        request.setCharacterEncoding("UTF-8");
        if (excludeFromFilter(request)) {
            chain.doFilter(req, res);
            return;
        }
        if (userManager == null || !userManager.isLoggedIn()) {
            if (request.getRequestURI().contains("login.xhtml")) {
                chain.doFilter(req, res);
                return;
            } else {
                response.sendRedirect(request.getContextPath() + "/login.xhtml");
                return;
            }
        } else {
            String path = request.getServletPath();
            // if user is logged in and trying to access login page
            if (path == null || path.contains("null") || path.contains("login.xhtml")) {
                response.sendRedirect(request.getContextPath() + "/index.xhtml");
                return;
            } else {
                chain.doFilter(request, response);
            }
        }
    }

    private boolean excludeFromFilter(HttpServletRequest req) {
        if (req.getRequestURI().startsWith(req.getContextPath() + ResourceHandler.RESOURCE_IDENTIFIER)) {
            return true; // add more page to exclude here
        } else if (req.getRequestURI().startsWith(req.getContextPath() + "/error.xhtml")) {
            return true;
        } else if (req.getRequestURI().startsWith(req.getContextPath() + "/accessDenied.xhtml")) {
            return true;
        } else {
            return false;
        }
    }

    @Override
    public void destroy() {
    }

}
